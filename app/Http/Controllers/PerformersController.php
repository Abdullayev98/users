<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\Category;

class PerformersController extends Controller
{
    public function service(){
        $categories = DB::table('categories')->get();
        $child_categories= DB::table('categories')->get();
        return view('Performers/performers',compact('child_categories','categories'));
    }
}
