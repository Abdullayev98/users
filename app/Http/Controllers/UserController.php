<?php

namespace App\Http\Controllers;
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
            Session::put('lang', $lang);
            return view('home', compact('tasks', 'howitworks', 'categories'))->withSuccess('Logged-in');

        } else {
            return view('auth.signin')->withSuccess('Credentials are wrong.');
        }
    }

    public function signup()
    {
        return view('auth.signup');
    }


    public function customSignup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required|regex:/^\+998(9[012345789])[0-9]{7}$/',
            'email',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $check = $this->createUser($data);
        $token = Str::random(64);
        UserVerify::create([
            'user_id' => $check->id,
            'token' => $token
        ]);
        Mail::send('email.emailVerificationEmail', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });
        return redirect("dashboard")->withSuccess('Successfully logged-in!');
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

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
        $message = 'Sorry your email cannot be identified.';
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
        return redirect()->route('login')->with('message', $message);
    }


}
