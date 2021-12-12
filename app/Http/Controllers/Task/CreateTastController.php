<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Models\Category;

class CreateTastController extends VoyagerBaseController
{
    //

    public function task_create(Request $request){

        $categories = Category::query()->where("parent_id", null)->get();
        $current_category = Category::find($request->category_id);
        $child_categories = Category::query()->where("parent_id", $current_category->id)->get();


        return view("create.name", compact('categories', 'current_category','child_categories'));


    }




}
