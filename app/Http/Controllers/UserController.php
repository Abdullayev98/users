<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
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
use App\Models\Notification;
use App\Events\MyEvent;


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

    public function createSignin(UserLoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            session()->flash('message', 'Введенный email не существует!');
            return redirect()->back();
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
            return view('home', compact('reklamas', 'tasks', 'advants', 'howitworks', 'categories', 'users_count', 'trusts', 'random_category'))->withSuccess('Logged-in');
        } else {
            return view('auth.signin')->withSuccess('Credentials are wrong.');
        }
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


    public function reset_submit(Request $request)
    {

        $data = $request->validate([
            'phone_number' => 'required|integer|exists:users'
        ]);
        $user = User::query()->where('phone_number', $data['phone_number'])->first();
        if (!$user) {
            return back()->with([
                'message' => "This phone number does not have an account!"
            ]);
        }
        $sms_otp = rand(100000, 999999);
        $user->verify_code = $sms_otp;
        $user->verify_expiration = Carbon::now()->addMinutes(5);
        $user->save();
        (new SmsService())->send(preg_replace('/[^0-9]/', '', $user->phone_number), $sms_otp);
        session(['phone' => $data['phone_number']]);

        return redirect()->route('user.reset_code_view');
    }

    public function reset_code(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|numeric|min:6'
        ]);
        $phone_number = $request->session()->get('phone');

        $user = User::query()->where('phone_number', $phone_number)->first();

        if ($data['code'] == $user->verify_code) {
            if (strtotime($user->verify_expiration) >= strtotime(Carbon::now())) {
                return redirect()->route('user.reset_password');
            } else {
                abort(419);
            }
        }else{
            return back()->with(['error' => 'Error Code']);
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
            return view('home', compact('tasks', 'howitworks', 'categories', 'reklamas', 'trusts'));
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

    public function verifyProfil(Request $request,User $user)
    {


        $request->validate([
            'sms_otp' => 'required',
        ],
            [
                'sms_otp.required' => 'Требуется заполнение!'
            ]
        );

        if ($request->sms_otp == $user->verify_code) {
            if (strtotime($user->verify_expiration) >= strtotime(Carbon::now())) {
                $user->update(['is_phone_number_verified' => 1]);
                Task::findOrFail($request->for_ver_func)->update(['status' => 1, 'user_id' => $user->id, 'phone' => $user->phone_number]);
                auth()->login($user);

// dd($request, $user);
                
                // foreach(User::all() as $users){


                //     $user_cat_ids = explode(",",$users->category_id);
                //     $check_for_true = array_search($category,$user_cat_ids);
        
                //     if($check_for_true !== false){
                //     Notification::create([
        
                //         'user_id'=>$users->id,
                //         'description'=> 1,
                //         'task_id'=>$id->id,
                //         "cat_id"=>$category,
                //         "name_task"=>$id->name,
                //         "type"=> 1
        
                //     ]);
                // }
        
                // }
        
                //    $user_id_fjs = NULL;
                //    $id_task = $id->id;
                //    $id_cat = $id->category_id;
                //    $title_task = $id->name;
                //    $type = 1;
        
                //        event(new MyEvent($id_task,$id_cat,$title_task,$type,$user_id_fjs));

                return redirect()->route('searchTask.task',$request->for_ver_func);
            } else {
                auth()->logout();
                return back()->with('expired_message', __('lang.contact_expired'));
            }
        } else {
            auth()->logout();
            return back()->with('incorrect_message', __('lang.contact_notVerify'));
        }

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
