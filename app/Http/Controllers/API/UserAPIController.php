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

    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }


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
            unset($data['password_confirmation']);
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

    /**
     *
     * @OA\Put (
     *     path="/api/update/{id}",
     *     tags={"User"},
     *     summary="Update User",
     *     security={
     *         {"token": {}}
     *     },
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="password",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"Javoxir",
     *                     "email":"admin@admin.com",
     *                     "password":"password",
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="name", type="string", example="Javoxir"),
     *              @OA\Property(property="email", type="string", example="admin@admin.com"),
     *              @OA\Property(property="password", type="string", example="password"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      )
     * )
     */
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

            return response()->json(['status' => true, 'message' => 'User data updated!']);
        } catch (ValidationException $e) {
            return response()->json(array_values($e->errors()));
        }
    }

    /**
     * @OA\DELETE(
     *     path="/api/delete/{id}",
     *     tags={"User"},
     *     summary="Delete Task",
     *     security={
     *         {"token": {}}
     *     },
     *     @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *     )
     * )
     */
    public function destroy()
    {
        auth()->user()->delete();
        return response()->json(['status' => true, 'message' => 'User data deleted!']);
    }

    /**
     * @OA\Post(
     *     path="/api/logout",
     *     tags={"User"},
     *     summary="User logout",
     *     security={
     *         {"token": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *          response=500,
     *          description="Server error"
     *     )
     * )
     */
    function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
    }
}
