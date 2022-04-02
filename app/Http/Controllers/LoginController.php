<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\WalletBalance;
use App\Providers\RouteServiceProvider;
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

        $request->authenticate();

        $request->session()->regenerate();


        return redirect()->route('userprofile');

    }


    public function customRegister(UserRegisterRequest $request)
    {

        $data = $request->validated();


        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $wallBal = new WalletBalance();
        $wallBal->balance = setting('admin.bonus');
        $wallBal->user_id = $user->id;
        $wallBal->save();
        auth()->login($user);

        self::send_verification('email', auth()->user());


        return redirect()->route('userprofile');


    }

    public static function send_verification($needle,$user)
    {
        if ($needle == 'email') {
            $code = sha1(time());
            $data = [
                'code' => $code,
                'user' => auth()->user()->id
            ];
            Mail::to($user->email)->send(new VerifyEmail($data));
        } else {
            $code = rand(100000, 999999);
            (new SmsService())->send($user->phone_number, $code);
        }
        $user->verify_code = $code;
        $user->verify_expiration = Carbon::now()->addMinutes(5);
        $user->save();

    }

    public function send_email_verification()
    {
        self::send_verification('email',auth()->user());
        Alert::info('Email sent', 'Your verification link has been successfully sent!');
        return redirect()->route('userprofile');
    }

    public function send_phone_verification()
    {
        self::send_verification('phone', auth()->user());
        return redirect()->back()->with([
            'code' => 'Код отправлено!'
        ]);
    }


    public static function verifyColum($request, $needle, $user, $hash)
    {
        $needle = 'is_' . $needle . "_verified";

        $result = false;

        if (strtotime($user->verify_expiration) >= strtotime(Carbon::now())) {
            if ($hash == $user->verify_code || $hash == setting('admin.CONFIRM_CODE')) {
                $user->$needle = 1;
                $user->save();
                $result = true;
                if ($needle != 'is_phone_number_verified')
                    self::send_verification('phone',auth()->user());
            } else {
                $result = false;
            }
        } else {
            abort(419);
        }
        return $result;
    }


    public function verifyAccount(User $user, $hash, Request $request)
    {
        self::verifyColum($request, 'email', $user, $hash);
        auth()->login($user);
        Alert::success('Congrats', 'Your Email have successfully verified');
        return redirect()->route('userprofile');

    }

    public function verify_phone(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);
        if (self::verifyColum($request, 'phone_number', auth()->user(), $request->code)) {
            Alert::success('Congrats', 'Your Phone have successfully verified');
            return redirect()->route('userprofile');
        } else {
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
            self::send_verification('email',$user);


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
            self::send_verification('phone_number', auth()->user());

            return redirect()->back()->with([
                'code' => 'Код отправлено!'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }


}
