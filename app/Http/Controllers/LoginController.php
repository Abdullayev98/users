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

    public function send_verification(){
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

        if (strtotime($user->verify_expiration) >= strtotime(Carbon::now()))
        {
            if ($request->code == $user->verify_code){
                $user->is_email_verified = 1;
                $user->verify_code = null;
                $user->verify_expiration = null;
                $user->save();
            }else
            {
                Alert::error('Email Verification', 'Error Message');
                return back();
            }
        }else
        {
            abort(419);
        }
        Alert::success('Congrats', 'Your Email have successfully verified');

        return redirect()->route('userprofile');
    }


    public function logout() {
        Auth::logout();

        return redirect('/');
    }


}
