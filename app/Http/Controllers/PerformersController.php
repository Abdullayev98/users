<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use App\Models\User;
use App\Models\UserView;
use Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;


class PerformersController extends Controller
{
    public function service(){
        $categories = DB::table('categories')->get();
        $child_categories= DB::table('categories')->get();
        $users= User::where('role_id',2)->paginate(50);
        return view('Performers/performers',compact('child_categories','categories','users'));
    }
    public function performer($id){
        $users= User::where('id',$id)->get();
        return view('Performers/executors-courier',compact('users'));
    }

public function perf_ajax($cf_id){
    // $str = "1,2,3,4,5,6,7,8";
    // $cat_arr = explode(",",$str);
    //dd(array_search($id,$cat_arr));

    // $users = User::where('role_id',2)->paginate(50);

    // return $users;

    $categories = DB::table('categories')->get();
    $child_categories= DB::table('categories')->get();
    $users= User::where('role_id',2)->paginate(50);
    return view('Performers/performers_cat',compact('child_categories','categories','users','cf_id'));

}

}
