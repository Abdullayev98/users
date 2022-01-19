<?php

namespace App\Http\Controllers;
use App\Models\Advant;
use App\Models\UserVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Task;
use App\Models\How_work_it;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Mail;
use Hash;
use TCG\Voyager\Models\Category;

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
            'name' => 'required',
            'password' => 'required',
        ]);
        $categories = Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get();
        $tasks = Task::withTranslations(['ru', 'uz'])->orderBy('id', 'desc')->take(15)->get();
        $howitworks = How_work_it::all();
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::find(Auth::user()->id)
                ->update([
                    'active_status' => 1,
                ]);
            $lang = Session::pull('lang');
            $users_count = User::where('role_id', 2)->count();
            $random_category = Category::all()->random();
            Session::put('lang', $lang);
            $advants = Advant::all();

            return view('home', compact('tasks','advants', 'howitworks', 'categories','users_count','random_category'))->withSuccess('Logged-in');

        } else {
            return view('auth.signin')->withSuccess('Credentials are wrong.');
        }
    }

    public function customSignup(Request $request)
    {
       $data = $request->validate(
            [
                'name'         => 'required|unique:users,name',
                'phone_number' => 'required|regex:/^\+998(9[012345789])[0-9]{7}$/|unique:users,phone_number',
                'email'        => 'required|email|unique:users,email',
                'password'     => 'required|min:6',
            ],
            [
                'name.required' => 'Требуется заполнение!',
                'name.unique' => 'Пользователь с таким именем уже существует!',
                'phone_number.required' => 'Требуется заполнение!',
                'phone_number.regex' => 'Неверный формат номера телефона!',
                'phone_number.unique' => 'Этот номер есть в системе!',
                'email.required' => 'Требуется заполнение!',
                'email.unique' => 'Пользователь с такой почтой уже существует!',
                'password.required' => 'Требуется заполнение!',
                'password.min' => 'Пароли должны содержать не менее 6-ми символов'
            ]
        );
        $check = $this->createUser($data);
        $token   = Str::random(64);
        $sms_otp = Str::random(5);
        $categories = Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get();
        $tasks      = Task::withTranslations(['ru', 'uz'])->orderBy('id', 'desc')->take(15)->get();
        $howitworks = How_work_it::all();
        UserVerify::create([
            'user_id' => $check->id,
            'token'   => $token,
            'sms_otp' => $sms_otp
        ]);
        if($request->has('email')){
            Mail::send('email.emailVerificationEmail', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Email Verification Mail');
            });
        }elseif($request->has('phone_number')){
            // TODO: send client sms
        }
        $random_category= Category::first();
        $users_count = User::where('role_id', 2)->count();
        $advants = Advant::all();
        return view('home', compact('tasks', 'howitworks', 'categories','random_category','users_count','advants'))->withSuccess('Logged-in');
    }

    public function createUser(array $data)
    {
        return User::create([
            'name'         => $data['name'],
            'phone_number' => $data['phone_number'],
            'email'        => $data['email'],
            'password'     => Hash::make($data['password'])
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
            return view('home', compact('tasks', 'howitworks', 'categories'));
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

    public function verifyAccount($token, $is_otp = false)
    {
        if($is_otp){
            $verifyUser = UserVerify::where('sms_otp', $token)->first();
        }else{
            $verifyUser = UserVerify::where('token', $token)->first();
        }
        $message = 'Sorry your profile cannot be identified.';
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your profile is verified. You can now login.";
            } else {
                $message = "Your profile is already verified. You can now login.";
            }
        }
        return redirect()->route('login')->with('message', $message);
    }
}
