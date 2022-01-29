<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PlayMobile\SMS\SmsService;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{


    public function login()
    {
        return view('auth.signin');
    }

    public function loginPost(UserLoginRequest $request)
    {
        $request->validated();
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('userprofile');
        }

        return redirect()->route('login')->with(
            [
                'message' => 'Email or Password is not correct. Try again',
            ]
        );

    }


    public function customRegister(UserRegisterRequest $request)
    {

        $request->validated();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->save();

        auth()->login($user);

        return redirect()->route('userprofile');


    }

    private static function send_verification($needle)
    {
        $user = auth()->user();

        if ($needle == 'email'){
            $code = sha1(time());
            Mail::to($user->email)->send(new VerifyEmail($code));
        }else{
            $code = rand(100000, 999999);
            (new SmsService())->send($user->phone_number, $code);
        }
        $user->verify_code = $code;
        $user->verify_expiration = Carbon::now()->addMinutes(5);
        $user->save();

        return redirect()->route('userprofile');
    }

    public function send_email_verification(){
        self::send_verification('email');
        Alert::info('Email sent', 'Your verification link has been successfully sent!');
        return redirect()->route('userprofile');
    }

    public function send_phone_verification(){
        self::send_verification('phone');
        return redirect()->back()->with([
            'code' => 'Code Sent'
        ]);
    }



    public static function verifyColum($request, $needle)
    {
        $needle = 'is_'.$needle."_verified";

        $user = auth()->user();
        $request->validate([
            'code' => 'required'
        ]);
        $result = false;

        if (strtotime($user->verify_expiration) >= strtotime(Carbon::now())) {
            if ($request->code == $user->verify_code) {
                $user->$needle = 1;
                $user->verify_code = null;
                $user->verify_expiration = null;
                $user->save();
                $result = true;
            } else {
                $result = false;
            }
        } else {
            abort(419);
        }
        return $result;
    }


    public function verifyAccount(Request $request)
    {
        self::verifyColum($request, 'email');
        Alert::success('Congrats', 'Your Email have successfully verified');
        return redirect()->route('userprofile');

    }

    public function verify_phone(Request $request)
    {
        if (self::verifyColum($request, 'phone_number'))
        {
            Alert::success('Congrats', 'Your Phone have successfully verified');
            return redirect()->route('userprofile');
        }else
        {
            return back()->with([
               'code' => 'Code Error!'
            ]);

        }
    }

    public function change_email(Request $request)
    {

        $user = auth()->user();

        if ($request->email == $user->email) {
            return back()->with([
                'email-message' => 'Your email',
                'email' => $request->email
            ]);
        } else {
            $request->validate([
                'email' => 'required|unique:users|email'
            ],
                [
                    'email.required' => __('login.email.required'),
                    'email.email' => __('login.email.email'),
                    'email.unique' => __('login.email.unique'),
                ]
            );
            $user->email = $request->email;
            $user->save();
            self::send_verification('email');


            Alert::success('Congrats', 'Your Email have successfully changed and We have sent to verification link to ' . $user->email);

            return redirect()->back();
        }
    }

    public function change_phone_number(Request $request)
    {

        $user = auth()->user();

        if ($request->phone_number == $user->phone_number) {
            return back()->with([
                'email-message' => 'Your phone',
                'email' => $request->email
            ]);
        } else {
            $request->validate([
                'phone_number' => 'required|unique:users|min:9'
            ],
                [
                    'phone_number.required' => __('login.phone_number.required'),
                    'phone_number.regex' => __('login.phone_number.regex'),
                    'phone_number.unique' => __('login.phone_number.unique'),
                    'phone_number.min' => __('login.phone_number.min'),
                ]
            );
            $user->phone_number = $request->phone_number;
            $user->save();
            self::send_verification('phone_number');

            return redirect()->back()->with([
                'code' => 'Code sent!'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }


}
