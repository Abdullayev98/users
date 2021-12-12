<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Models\Category;

class CreateTaskController extends VoyagerBaseController
{
    //

    public function task_create(Request $request){

        $categories = Category::query()->where("parent_id", null)->get();
        $current_category = Category::find($request->category_id);
        $current_parent_category = Category::find($current_category->parent_id);
        $child_categories = Category::query()->where("parent_id", $current_parent_category->id)->get();


        return view("create.name", compact('categories', 'current_category','child_categories', 'current_parent_category'));
    }

    public function location_create(){
        return view('create.location');
    }

    public function custom(){
        return view('create.custom');
    }

    public function date(){
        return view('create.date');
    }
    public function budget(){
        return view('create.budget');
    }
    public function notes(){
        return view('create.notes');
    }
    public function contacts(){
        return view('create.contacts');
    }




}
