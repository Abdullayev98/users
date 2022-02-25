<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class UserAPIController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    function login(UserLoginRequest $request)
    {
        $data = $request->validated();

        if (!auth()->attempt($data)) {
            return response(['message' => 'Invalid Email or Password']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token'=>$accessToken]);

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
            $user->remember_token = Str::random(60);
            $user->save();
            return response()->json(['user' => $user, 'status' => 'true', 'message' => 'User successfully registered!']);
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
            return response()->json(['status' => 'false', 'message' => $e->getMessage(), 200]);
        }
        return response()->json(['message' => 'User logout successfully']);

    }
}
