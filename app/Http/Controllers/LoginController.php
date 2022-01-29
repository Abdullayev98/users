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

    public function send_verification()
    {
        $user = auth()->user();
        $user->verify_code = sha1(time());
        $user->verify_expiration = Carbon::now()->addMinutes(5);
        $user->save();
        Mail::to($user->email)->send(new VerifyEmail($user->verify_code));


        Alert::info('Email sent', 'Your verification link has been successfully sent!');

        return redirect()->route('userprofile');
    }

    public function verifyAccount(Request $request)
    {
        $user = auth()->user();
        $data = $request->validate([
            'code' => 'required'
        ]);

        if (strtotime($user->verify_expiration) >= strtotime(Carbon::now())) {
            if ($request->code == $user->verify_code) {
                $user->is_email_verified = 1;
                $user->verify_code = null;
                $user->verify_expiration = null;
                $user->save();
            } else {
                Alert::error('Email Verification', 'Error Message');
                return back();
            }
        } else {
            abort(419);
        }
        Alert::success('Congrats', 'Your Email have successfully verified');

        return redirect()->route('userprofile');
    }


    public function change_email(Request $request)
    {

        $user = auth()->user();

        if ($request->email == $user->email){
            return back()->with([
                'email-message' => 'Your email',
                'email' => $request->email
            ]);
        }else{
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
            $user->verify_code = sha1(time());
            $user->verify_expiration = Carbon::now()->addMinutes(5);
            $user->save();
            Mail::to($user->email)->send(new VerifyEmail($user->verify_code));

            Alert::success('Congrats', 'Your Email have successfully changed and We have sent to verification link to '.$user->email);

            return redirect()->back();
        }
   }

    public function change_phone_number(Request $request)
    {

        $user = auth()->user();

        if ($request->phone_number == $user->phone_number){
            return back()->with([
                'email-message' => 'Your phone',
                'email' => $request->email
            ]);
        }else{
            $request->validate([
                'phone_number' => 'required|unique:users|number|min:9'
            ],
                [
                    'phone_number.required' => __('login.phone_number.required'),
                    'phone_number.regex' => __('login.phone_number.regex'),
                    'phone_number.unique' => __('login.phone_number.unique'),
                ]
            );
            $user->email = $request->email;
            $user->verify_code = sha1(time());
            $user->verify_expiration = Carbon::now()->addMinutes(5);
            $user->save();
            Mail::to($user->email)->send(new VerifyEmail($user->verify_code));

            Alert::success('Congrats', 'Your Email have successfully changed and We have sent to verification link to '.$user->email);

            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }


}
