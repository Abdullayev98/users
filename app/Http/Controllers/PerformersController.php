<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use App\Models\User;


class PerformersController extends Controller
{
    public function service(){
        $categories = DB::table('categories')->get();
        $child_categories= DB::table('categories')->get();
        return view('Performers/performers',compact('child_categories','categories'));
    }
    public function performer($id){
        $users= User::where('id',$id)->get();
        // $posts = User::find($id); // fetch post from database
        // $posts->increment('views'); // add a new page view to our 'views' column by incrementing it
        $posts = User::updateViews($id);


        return view('Performers/executors-courier',compact('users','posts'));
    }
}
