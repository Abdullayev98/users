<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use App\Models\User;
use App\Models\UserView;
use Session;



class PerformersController extends Controller
{
    public function service(){
        $categories = DB::table('categories')->get();
        $child_categories= DB::table('categories')->get();
        return view('Performers/performers',compact('child_categories','categories'));
    }
    public function performer($id){
        $users= User::where('id',$id)->get();
        return view('Performers/executors-courier',compact('users'));
    }
}
