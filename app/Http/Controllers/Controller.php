<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\How_work_it;
use App\Models\User;
use App\Models\UserView;
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

    public function home(Request $request){
        $categories =Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get();
        $tasks  =  Task::withTranslations(['ru', 'uz'])->orderBy('id', 'desc')->take(15)->get();
        $howitworks = How_work_it::all();
        if (!session()->has('lang')) {
            Session::put('lang', 'ru');
        }
        $random_category= Category::all()->random();

        return view('home',compact('tasks','howitworks', 'categories','random_category'));
    }

    public function home_profile()
    {
        $user = User::find(Auth::user()->id);
        $vcs = UserView::where('user_id', $user->id)->get();
        $user->update();
        return view('profile.profile', compact('user','vcs'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'avatar' => 'required|image'
        ]);
        $user= User::find($id);
        $data = $request->all();

        if($request->hasFile('avatar')){
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
        return  redirect()->route('userprofile');
    }
    public function task_create(){
        return view('/create/name');
    }
    public function location_create(){
        return view('/create/location');
    }
    public function task_search(){
        return view('task/search2');
    }
    public function performers(){
        return view('performer');
    }

    public function profile_cash(){
        return view('/profile/cash');
    }
    public function profile_settings(){
        return view('/profile/settings');
    }
    public function geotaskshint(){
        return view('/staticpages/geotaskshint');
    }
    public function security(){
        return view('/staticpages/security');
    }
    public function badges(){
        return view('/staticpages/badges');
    }
    public function my_tasks(){
        $tasks = Task::where('user_id', Auth::id())->get();
        $task_count = Task::where('user_id', Auth::id())->count();
        $categories = Category::get();
        return view('task.mytasks',compact('tasks','task_count','categories'));
    }

    public function category($id){
        $categories =Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get();
        $choosed_category = Category::withTranslations(['ru', 'uz'])->where('id', $id)->get();
        $child_categories= Category::withTranslations(['ru', 'uz'])->where('parent_id',$id)->get();
        return view('task/choosetasks',compact('child_categories','categories','choosed_category'));
    }
    public function lang($lang){
        Session::put('lang', $lang);
        return redirect()->back();
    }

}
