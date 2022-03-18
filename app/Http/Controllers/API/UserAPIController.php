<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
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
    /**
     * @OA\Get(
     *      path="/users",
     *      operationId="getUsersList",
     *      tags={"Users"},
     *      summary="Get list of users",
     *      description="Returns list of users",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     * )
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * @OA\Post(
     *      path="/login",
     *      operationId="postLogin",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    function login(UserLoginRequest $request)
    {
        $request->authenticate();

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token'=>$accessToken]);

    }

    public function register(UserRegisterRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);
            $user->api_token = Str::random(60);
            $user->remember_token = Str::random(60);

            $user->save();
            Auth::login($user);
            $accessToken = auth()->user()->createToken('authToken')->accessToken;

            return response(['user' => auth()->user(), 'access_token'=>$accessToken]);
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

    function logout()
    {

        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
    }
}
