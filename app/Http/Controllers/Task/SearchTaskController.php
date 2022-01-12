<?php

namespace App\Http\Controllers\Task;

use App\Models\WalletBalance;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\Task;
use App\Models\TaskResponse;
use TCG\Voyager\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;


class SearchTaskController extends VoyagerBaseController
{

    public function task_search(){


        $tasks = Task::withTranslations(['ru', 'uz'])->orderBy('id','desc')->get();
        $categories = Category::withTranslations(['ru', 'uz']);
        return view('task.search', compact('tasks','categories'));
    }

    public function ajax_tasks(Request $request){
        if (isset($request->orderBy)) {
            if ($request->orderBy == 'all') {
              $tasks =  DB::table("tasks")
              ->join('categories', 'tasks.category_id', '=', 'categories.id')
              ->select('tasks.*', 'categories.name as category_name', 'categories.ico as icon')
              ->get();
          }
        }
        return $tasks->all();
    }

    public function my_tasks(){
        $tasks = Task::where('user_id', auth()->id())->get();
        $categories = Category::get();
        return view('/task/mytasks',compact('tasks','categories'));
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
    $categories = Category::all();
      return view('task.search', compact('tasks','s','a','p','categories'));

    }
    public function task($id){
        $balance = WalletBalance::where('user_id',Auth::id())->first();
        if ($balance){
            $balance =  $balance->balance;
        }else{
            $balance = 0;
        }

        $tasks = Task::where('id',$id)->first();
          $cat_id = $tasks->category_id;
          $user_id = $tasks->user_id;
        $same_tasks = Task::where('category_id',$cat_id)->get();

        $task_responses = TaskResponse::where('task_id', $tasks->id)->get();
        $response_count = TaskResponse::where('task_id', $tasks->id)->count();
        foreach($task_responses as $response){
          $response_users = User::where('id', $response->user_id)->first();
          }

          $users = User::all();
          $current_user = User::find($user_id);
          $categories = Category::where('id',$cat_id)->get();

          $auth_user = Auth::user();

        $arr = get_defined_vars();

        if (Arr::exists($arr, 'response_users')) {
            return view('task.detailed-tasks',compact('tasks','same_tasks','users','categories','current_user','task_responses','response_users','response_count','balance','auth_user'));
        }else {
          return view('task.detailed-tasks',compact('tasks','same_tasks','users','categories','current_user','balance','auth_user'));
        }

    }

    public function task_response(Request $request){
      $status = $request->input('status');
      $performer_id = $request->input('performer_id');
      $task_id = $request->input('task_id');
      $description = $request->input('response_desc');
      if($status){
        Task::where('id', $task_id)->update([
          'status' => $status,
          'performer_id' => $performer_id,
        ]);
      }
      if($description){
        $notificate = $request->input('notificate');
        $response_time = $request->input('response_time');
        $response_price = $request->input('response_price');
        $task_id = $request->input('task_id');
        $users_id = $request->input('user_id');
        TaskResponse::create([
          'user_id' => Auth::id(),
          'task_id' => $task_id,
          'description' => $description,
          'notificate' => $notificate,
          'time' => $response_time,
          'price' => $response_price,
          'price' => $response_price,
          'creator_id' => $users_id
        ]);
      }
      return response()->json(['success'=>$performer_id]);
  }

}
