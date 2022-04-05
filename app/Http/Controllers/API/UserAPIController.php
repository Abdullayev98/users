<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use PlayMobile\SMS\SmsService;

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

    public function reset_submit(Request $request)
    {

        $data = $request->validate([
            'phone_number' => 'required|integer|exists:users'
        ]);
        $user = User::query()->where('phone_number', $data['phone_number'])->first();
        $sms_otp = rand(100000, 999999);
        $user->verify_code = $sms_otp;
        $user->verify_expiration = Carbon::now()->addMinutes(5);
        $user->save();
        (new SmsService())->send(preg_replace('/[^0-9]/', '', $user->phone_number), $sms_otp);
        session(['phone' => $data['phone_number']]);

        return response()->json(['success' => true, 'message' => "SMS Code is send!"]);
    }

    public function reset_password_save(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|integer|exists:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);
        $user = User::query()->where('phone_number',$request->phone_number)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        auth()->login($user);

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'access_token'=>$accessToken]);

    }

    public function reset_code(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|numeric|min:6',
            'phone_number' => 'required|numeric|exists:users'
        ]);

        $user = User::query()->where('phone_number', $data['phone_number'])->first();

        if ($data['code'] == $user->verify_code) {
            if (strtotime($user->verify_expiration) >= strtotime(Carbon::now())) {
                return response()->json(['success'=> true, 'message' => 'Enter a new password']);
            } else {
                abort(419);
            }
        }else{
            return response()->json(['success'=> false, 'message' => 'Error Code']);
        }
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
     *     path="/api/delete",
     *     tags={"User"},
     *     summary="Delete User",
     *     security={
     *         {"token": {}}
     *     },
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
