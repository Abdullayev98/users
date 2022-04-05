<?php

namespace App\Http\Controllers;

use App\Models\Advant;
use App\Models\Task;
use App\Models\How_work_it;
use App\Models\User;
use App\Models\Reklama;
use App\Models\Trust;
use App\Models\UserView;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Models\Category;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home(Request $request)
    {
        $categories = Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get();
        $tasks  =  Task::where('status', 1)->orWhere('status',2)->orderBy('id', 'desc')->take(20)->get();
        $howitworks = How_work_it::all();
        if (!session()->has('lang')) {
            Session::put('lang', 'ru');
        }
        $random_category = Category::skip(1)->first();
        $users_count = User::where('role_id', 2)->count();
        $advants = Advant::all();
        $reklamas = Reklama::all();
        $trusts = Trust::orderby('id', 'desc')->get();
        return view('home', compact('tasks', 'howitworks', 'categories', 'random_category', 'users_count', 'advants', 'reklamas', 'trusts'));
    }

    public function home_profile()
    {
        $user = User::find(Auth::user()->id);
        $vcs = UserView::where('user_id', $user->id)->get();
        return view('profile.profile', compact('user', 'vcs'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'avatar' => 'required|image'
        ]);
        $user = User::find($id);
        $data = $request->all();

        if ($request->hasFile('avatar')) {
            Storage::delete($user->avatar);
            $data['avatar'] = $request->file('avatar')->store("images/users");
            // $filename = $request->file('avatar')->getClientOriginalName();
            // Storage::disk('avatar')->putFileAs('images/users', $request->file('avatar'), $filename);
            $filename = request()->file('avatar');
            $extention = File::extension($filename);
            $file = $filename;
            $file->store('images/users', ['disk' => 'avatar']);
        }
        $user->update($data);
        return  redirect()->route('profile.profileData');
    }
    public function task_create()
    {
        return view('/create/name');
    }
    public function location_create()
    {
        return view('/create/location');
    }
    public function task_search()
    {
        return view('task/search2');
    }
    public function performers()
    {
        return view('performer');
    }

    public function profile_cash()
    {
        return view('/profile/cash');
    }
    public function profile_settings()
    {
        return view('/profile/settings');
    }
    public function geotaskshint()
    {
        return view('/staticpages/geotaskshint');
    }
    public function security()
    {
        return view('/staticpages/security');
    }
    public function badges()
    {
        return view('/staticpages/badges');
    }
    public function my_tasks()
    {
        $user = auth()->user();
        $tasks = $user->tasks()->orderBy('created_at','desc')->get();
        $perform_tasks = $user->performer_tasks;
        $datas = new Collection(); //Create empty collection which we know has the merge() method
        $datas = $datas->merge($tasks);
        $datas = $datas->merge($perform_tasks);
        $categories = getAllCategories();
        return view('task.mytasks',compact('tasks','perform_tasks','categories','datas'));
    }

    public function category($id)
    {
        $categories = Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get();
        $choosed_category = Category::withTranslations(['ru', 'uz'])->where('id', $id)->get();
        $child_categories = Category::withTranslations(['ru', 'uz'])->where('parent_id', $id)->get();
        $idR = $id;
        return view('task/choosetasks', compact('child_categories', 'categories', 'choosed_category', 'idR'));
    }
    public function lang($lang)
    {
        Session::put('lang', $lang);
        return redirect()->back();
    }
    public function download()
    {
        $filePath = public_path("storage/settings/April2022/dom.pdf");
        $headers = ['Content-Type: application/pdf'];
        $fileName ='Правила_сервиса.pdf';
        return response()->download($filePath, $fileName, $headers);
    }
}
