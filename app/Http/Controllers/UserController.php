<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPhoneRequest;
use App\Models\User;
use App\Models\Task;
use App\Models\Trust;
use App\Models\Reklama;
use App\Models\Advant;
use App\Models\UserVerify;
use App\Models\How_work_it;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use TCG\Voyager\Models\Category;
use PlayMobile\SMS\SmsService;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.signin');
    }

    public function code()
    {
        return view('auth.register_code');
    }
    public function signup()
    {
        return view('auth.signup');
    }

    public function reset()
    {
        return view('auth.reset');
    }

    public function confirm()
    {
        return view('auth.confirm');
    }

    public function createSignin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'));

        if(!$user){
            return redirect()->back()->with('message','Введенный email не существует!');
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::find(Auth::user()->id)
                ->update([
                    'active_status' => 1,
                ]);
            $lang = Session::pull('lang');
            Session::put('lang', $lang);
            $categories = Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get();
            $tasks = Task::withTranslations(['ru', 'uz'])->orderBy('id', 'desc')->take(15)->get();
            $howitworks = How_work_it::all();
            $users_count = User::where('role_id', 2)->count();
            $random_category = Category::all()->random();
            $advants = Advant::all();
            $trusts = Trust::orderby('id', 'desc')->get();
            $reklamas = Reklama::all();
            return view('home', compact('reklamas','tasks', 'advants', 'howitworks', 'categories', 'users_count','trusts', 'random_category'))->withSuccess('Logged-in');
        } else {
            return view('auth.signin')->withSuccess('Credentials are wrong.');
        }
    }



    public function customSignup(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required',
                'phone_number' => 'required|unique:users',
                'email' => 'required|email|unique:users|email',
                'password' => 'required|min:6|confirmed',
            ],
            [
                'name.required' => 'Требуется заполнение!',
                'name.unique' => 'Пользователь с таким именем уже существует!',
                'phone_number.required' => 'Требуется заполнение!',
                'phone_number.regex' => 'Неверный формат номера телефона!',
                'phone_number.unique' => 'Этот номер есть в системе!',
                'email.required' => 'Требуется заполнение!',
                'email.email' => 'Требуется заполнение!',
                'email.unique' => 'Пользователь с такой почтой уже существует!',
                'password.required' => 'Требуется заполнение!',
                'password.min' => 'Пароли должны содержать не менее 6-ми символов',
                'password.confirmed' => 'Пароль не совпадает'
            ]
        );
        $user = User::create($data);
        $token = Str::random(64);
        $sms_otp = rand(100000, 999999);

        if ($request->has('email')) {
            //            Mail::send('email.emailVerificationEmail', ['token' => $token], function ($message) use ($request) {
            //                $message->to($request->email);
            //                $message->subject('Email Verification Mail');
            //            });
        }
        $message = "Code: {$sms_otp} user.uz";
        $response = (new SmsService())->send($data['phone_number'], $message);
        $user->verify_code = $sms_otp;
        $user->verify_expiration = Carbon::now()->addMinutes(5);
        $user->save();
        auth()->login($user);

        return redirect()->route('register.code');
    }

    public function code_submit(Request $request)
    {

        $user = auth()->user();
        if ($request->code == $user->verify_code) {
            if (strtotime($user->verify_expiration) >= strtotime(Carbon::now())) {
                return redirect('/profile');
            } else {
            }
        }
    }


    public function reset_submit(UserPhoneRequest $request)
    {

        $data = $request->validated();
        $user = User::query()->where('phone_number', $data['phone_number'])->first();
        if (!$user) {
            return back();
        }
        $sms_otp = rand(100000, 999999);
        $user->verify_code = $sms_otp;
        $user->verify_expiration = Carbon::now()->addMinutes(5);
        $user->save();
        $response = (new SmsService())->send(preg_replace('/[^0-9]/', '', $user->phone_number), $sms_otp);
        session(['phone' => $data['phone_number']]);

        return redirect()->route('password.reset.code.view');
    }

    public function reset_code(Request $request)
    {
        $phone_number = $request->session()->get('phone');

        $user = User::query()->where('phone_number', $phone_number)->first();

        if ($request->code == $user->verify_code) {
            if (strtotime($user->verify_expiration) >= strtotime(Carbon::now())) {
                return redirect()->route('password.reset.password');
            } else {
            }
        }
    }


    public function reset_code_view()
    {

        return view('auth.code');
    }

    public function reset_password(Request $request)
    {
        return view('auth.confirm_password');
    }

    public function reset_password_save(Request $request)
    {
        $user = User::query()->where('phone_number', $request->session()->get('phone'))->first();
        $user->password = bcrypt($request->password);
        $user->save();
        auth()->login($user);
        return redirect('/profile');
    }
    public function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboardView()
    {
        if (Auth::check()) {
            $categories = Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get();
            $tasks = Task::withTranslations(['ru', 'uz'])->orderBy('id', 'desc')->take(15)->get();
            $howitworks = How_work_it::all();
            $lang = Session::pull('lang');
            Session::put('lang', $lang);
            $reklamas = Reklama::all();
            $trusts = Trust::orderby('id', 'desc')->get();
            return view('home', compact('tasks', 'howitworks', 'categories','reklamas','trusts'));
        }
        return redirect("login")->withSuccess('Access is not permitted');
    }

    public function logout()
    {
        $user = User::find(Auth::id())
            ->update([
                'active_status' => 0,
            ]);
        $lang = Session::pull('lang');
        Session::flush();
        Auth::logout();
        Session::put('lang', $lang);
        return redirect('/');
    }

    public function verifyProfil(Request $request)
    {
        $request->validate([
            'sms_otp' => 'required',
        ]);

        $user = auth()->user();

        if ($request->sms_otp == $user->verify_code) {
            if (strtotime($user->verify_expiration) >= strtotime(Carbon::now())) {
                return redirect()->route('userprofile');
            } else {
                return back()->with([
                    'alert' => 'Verification code expired'
                ]);
            }
        }else{
            return back()->with([
                'message' => 'Verification code incorrect'
            ]);
        }

        $message = $this->checkIsVerified($verifyUser);

        return redirect("/profile")->with('message', $message);
    }

    public function verifyAccount($token, $is_otp = false)
    {
        if ($is_otp) {
            $verifyUser = UserVerify::where('sms_otp', $token)->first();
        } else {
            $verifyUser = UserVerify::where('token', $token)->first();
        }
        $message = $this->checkIsVerified($verifyUser);
        return redirect()->route('login')->with('message', $message);
    }

    public function checkIsVerified($verifyUser)
    {
        $message = 'Sorry your profile cannot be identified.';

        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;
            if (!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your profile is verified. You can now login.";
            } else {
                $message = "Your profile is already verified. You can now login.";
            }
        }
        return $message;
    }
}
