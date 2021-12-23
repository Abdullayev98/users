<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;


class SearchTaskController extends VoyagerBaseController
{

    public function task_search(){


        $tasks = Task::paginate(20);

//        return view("task/search", compact('tasks', paginate(50)));
//        dd($tasks->all());
//          return view('task.search', ['tasks'=>$tasks->paginate(50)]);
        return view('task.search', compact('tasks'));
    }

    public function my_tasks(){
        $tasks = Task::where('user_id', auth()->id());
//        dd($tasks);
        return view('/task/mytasks',compact('tasks'));
    }
    public function search(Request $request){
      $s = $request->s;
      $a = $request->a;
      $p = $request->p;
      // dd($s);
      if ($request->s) {
      $tasks = Task::where('name','LIKE',"%$s%")->orderBy('name')->paginate(10);
    }elseif ($request->a) {
      $tasks = Task::where('address','LIKE',"%$a%")->orderBy('name')->paginate(10);
    }elseif ($request->p) {
      $tasks = Task::where('budget','LIKE',"%$p%")->orderBy('name')->paginate(10);
    }else {
      $tasks = Task::where('name','LIKE',"%$s%")->orWhere('address','LIKE',"%$a%")->orWhere('budget','LIKE',"%$p%")->orderBy('name')->paginate(10);
    }
      return view('task.search', compact('tasks','s','a','p'));

    }

}
