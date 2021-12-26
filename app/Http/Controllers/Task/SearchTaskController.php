<?php

namespace App\Http\Controllers\Task;

use App\Models\User;
use App\Models\Task;
use TCG\Voyager\Models\Category;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;


class SearchTaskController extends VoyagerBaseController
{

    public function task_search(){


        $tasks = Task::orderBy('id','desc')->paginate(20);
        $categories = Category::get()->all();
        // dd($categories);

//        return view("task/search", compact('tasks', paginate(50)));
//        dd($tasks->all());
//          return view('task.search', ['tasks'=>$tasks->paginate(50)]);
        return view('task.search', compact('tasks','categories'));
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
    $categories = Category::get()->all();
      return view('task.search', compact('tasks','s','a','p','categories'));

    }
    public function task($id){
        $tasks = Task::where('id',$id)->get();
        foreach ($tasks as $task) {
          $cat_id = $task->category_id;
          $user_id = $task->category_id;
        }
        $same_tasks = Task::where('category_id',$cat_id)->get();

        $users = User::all();
        $current_user = User::find($user_id);
        $categories = Category::where('id',$cat_id)->get();

        return view('task.detailed-tasks',compact('tasks','same_tasks','users','categories','current_user'));
    }

}
