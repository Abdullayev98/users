<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class UserAPIController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    function login(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                $user = auth()->user();
                $user->device_token = $request->input('device_token', '');
                $user->save();
                return response()->json(['user' => $user, 'message' => 'User logged in successfully']);
            } else {
                return response()->json(['status' => 200, 'message' => 'Credentials are not valid']);
            }
        } catch (ValidationException $e) {
            return response()->json(array_values($e->errors()));
        }

    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|min:5|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|max:16',
            ]);
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone_number = $request->input('phone_number');
            $user->password = Hash::make($request->input('password'));
            $user->api_token = Str::random(60);
            $user->save();
            return response()->json(['user'=>$user,'status' => 'true', 'message' => 'User successfully registered!']);
        } catch (ValidationException $e) {
            return response()->json(array_values($e->errors()));
        }
    }



    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|min:5|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|max:16',
            ]);

            $user = User::where('id', $id)->first();
            $user->update($request->all());

            return response()->json(['status' => 'true', 'message' => 'User data updated!']);
        } catch (ValidationException $e) {
            return response()->json(array_values($e->errors()));
        }
    }

    public function destroy($id)
    {
        $user = DB::table('users')->where('id', $id)->delete();
        return response()->json(['status' => 'true', 'message' => 'User data deleted!']);
    }

    function logout(Request $request)
    {
        try {
            auth()->logout();
        } catch (Exception $e) {
            $this->sendError($e->getMessage(), 200);
            return response()->json(['status' => 'false', 'message' => $e->getMessage(),200]);
        }
        return response()->json(['message'=> 'User logout successfully']);

    }
    public function loginWithFacebook(){
        $user = Socialite::driver('facebook')->stateless()->user();
        $findUser = User::where('facebook_id',$user->id)->first();
        if($findUser){
            Auth::login($findUser);
            return redirect('/');
        }else{
            $new_user = new User();
            $new_user->name = $user->name;
            $new_user->email = $user->email;
            $new_user->facebook_id = $user->id;
            $new_user->password = bcrypt('123456');
            $new_user->save();
            Auth::login($new_user);
            return redirect('/');
        }
    }
    public function loginWithGoogle(){
        $user = Socialite::driver('google')->stateless()->user();
        $findUser = User::where('google_id',$user->id)->first();
        if($findUser){
            Auth::login($findUser);
            return redirect('/');
        }else{
            $new_user = new User();
            $new_user->name = $user->name;
            $new_user->email = $user->email;
            $new_user->google_id = $user->id;
            $new_user->password = bcrypt('123456');
            $new_user->save();
            Auth::login($new_user);
            return redirect('/');
        }
    }
}
