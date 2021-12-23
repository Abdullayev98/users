<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use App\Models\User;
use App\Models\BrowsingHistory;
use App\Models\PostView;
use Session;



class PerformersController extends Controller
{
    public function service(){
        $categories = DB::table('categories')->get();
        $child_categories= DB::table('categories')->get();
        $users= User::where('role_id',2)->get();
        return view('Performers/performers',compact('child_categories','categories','users'));
    }
    public function performer($id){
        $users= User::where('id',$id)->get();
        $categories = DB::table('categories')->get();
        $child_categories = DB::table('categories')->get();
        return view('Performers/executors-courier',compact('users','categories','child_categories'));
    }
}
