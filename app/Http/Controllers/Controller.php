<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\Category;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home(){
        $tasks  =  Task::latest()->paginate(15);
        return view('home',compact('tasks'));
    }
    public function home_profile(){
        return view('/profile/profile');
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
        $tasks = Task::where('user_id', auth()->id());
        return view('/task/mytasks',compact('tasks'));
    }
    public function category($id){
        $categories = DB::table('categories')->where('parent_id', null)->get();
        $choosed_category = DB::table('categories')->where('id', $id)->get();
        $child_categories= DB::table('categories')->where('parent_id',$id)->get();
        return view('task/choosetasks',compact('child_categories','categories','choosed_category'));
    }

}
