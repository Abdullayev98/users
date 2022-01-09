<?php

namespace App\Http\Controllers\Task;

use App\Models\User;
use App\Models\Task;
use App\Models\TaskResponse;
use TCG\Voyager\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;


class SearchTaskController extends VoyagerBaseController
{

    public function task_search(){


        $tasks = Task::withTranslations(['ru', 'uz'])->orderBy('id','desc')->paginate(20);
        $categories = Category::withTranslations(['ru', 'uz'])->get();

        return view('task.search', compact('tasks','categories'));
    }

    public function ajax_tasks(Request $request){
        if (isset($request->orderBy)) {
            if ($request->orderBy == 'all') {
                $tasks = new Task();
            }
        }
        return $tasks->all();
    }

    public function my_tasks(){
        $tasks = Task::where('user_id', auth()->id());
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
        $tasks = Task::where('id',$id)->first();
          $cat_id = $tasks->category_id;
          $user_id = $tasks->user_id;
        $same_tasks = Task::where('category_id',$cat_id)->get();

        $users = User::all();
        $current_user = User::find($user_id);
        $categories = Category::where('id',$cat_id)->get();

        // dd($current_user);
        return view('task.detailed-tasks',compact('tasks','same_tasks','users','categories','current_user'));
    }

    public function task_response(Request $request){
      $description = $request->input('response_desc');
      $notificate = $request->input('notificate');
      $response_time = $request->input('response_time');
      $response_price = $request->input('response_price');
      $task_id = $request->input('task_id');
      #create or update your data here
      TaskResponse::create([
        'user_id' => Auth::id(),
        'task_id' => $task_id,
        'description' => $description,
        'notificate' => $notificate,
        'time' => $response_time,
        'price' => $response_price
      ]);
      return response()->json(['success'=>$description]);
  }

}
