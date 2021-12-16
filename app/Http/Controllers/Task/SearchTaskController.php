<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;


class SearchTaskController extends VoyagerBaseController
{

    public function task_search(){

        $tasks = new Task();

//        return view("task/search", compact('tasks', paginate(50)));
//        dd($tasks);
          return view('task.search', ['tasks'=>$tasks->paginate(50)]);
    }


}
