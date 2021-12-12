<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home(){
        return view('home');
    }
    public function home_profile(){
        return view('/Profile/profile');
    }
    public function task_create(){
        return view('/create/name');
    }
    public function location_create(){
        return view('/create/location');
    }
}
