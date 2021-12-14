<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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

}
