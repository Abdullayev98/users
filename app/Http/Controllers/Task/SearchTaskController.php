<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;


class SearchTaskController extends VoyagerBaseController
{

    public function task_search(){

        $tasks = new Task();

//        return view("task/search", compact('tasks', paginate(50)));
//        dd($tasks->all());
//          return view('task.search', ['tasks'=>$tasks->paginate(50)]);
        return view('task.search', ['tasks'=>$tasks->paginate(50)]);
    }

    public function my_tasks(){
//        $tasks = Task::where('providers_id', auth()->id());
        $tasks = Task::where('providers_id', auth()->id());
//        dd($tasks);
        return view('/task/mytasks',compact('tasks'));
    }

}
