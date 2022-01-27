<?php

namespace App\Http\Controllers\Task;

use App\Models\WalletBalance;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\Task;
use App\Models\Notification;
use App\Models\TaskResponse;
use TCG\Voyager\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;


class SearchTaskController extends VoyagerBaseController
{
    public function task_search(){
//        $tasks = Task::orderBy('id','desc')->where('status',null)->count();
//        $categories = Category::get()->all();
//        return view('task.search', compact('tasks','categories'));
        return view('task.search');
    }

    public function ajax_tasks(Request $request){
        if (isset($request->orderBy)) {
            if ($request->orderBy == 'all') {
                $tasks = DB::table("tasks")->where('status', 1)->orderBy('id', 'desc')
                    ->join('categories', 'tasks.category_id', '=', 'categories.id')
                    ->select('tasks.*', 'categories.name as category_name', 'categories.ico as icon')
                    ->get();
            }
            if ($request->orderBy == 'sroch') {
                $tasks =  DB::table("tasks")->where('status',1)->orderBy('start_date','asc')
                    ->join('categories', 'tasks.category_id', '=', 'categories.id')
                    ->select('tasks.*', 'categories.name as category_name', 'categories.ico as icon')
                    ->get();
            }
            if ($request->orderBy == 'udal') {
                $tasks =  DB::table("tasks")->where([['address', '=', null], ['status', '=', null]])
                    ->orderBy('id','desc')
                    ->join('categories', 'tasks.category_id', '=', 'categories.id')
                    ->select('tasks.*', 'categories.name as category_name', 'categories.ico as icon')
                    ->get();
            }
            if ($request->orderBy == 'klyuch') {
                $filter = $request->fltr;
                $tasks =  DB::table("tasks")->where('name','LIKE',"%$filter%")->orderBy('name','desc')->get();
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
      $comment = $request->input('comment');
      $name_task = $request->input('name_task');
      $users_id = $request->input('user_id');
      $good = $request->input('good');
      if($status){
        Task::where('id', $task_id)->update([
          'status' => $status,
          'performer_id' => $performer_id,
        ]);
        Notification::create([
          'user_id' => $performer_id,
          'task_id' => $task_id,
          'name_task' => $name_task,
          'description' => 1,
          'type' => 3
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
        Notification::create([
          'user_id' => $users_id,
          'task_id' => $task_id,
          'name_task' => $name_task,
          'description' => 1,
          'type' => 2
        ]);
      }
      if($comment){
        if(Auth::id() == $users_id){
          Review::create([
            'user_id' => $performer_id,
            'description' => $comment,
            'good_bad' => $good,
            'reviewer_id' => Auth::id(),
            'task_id' => $task_id,
          ]);
        }
        if(Auth::id() == $performer_id){
          Review::create([
            'user_id' => $users_id,
            'description' => $comment,
            'good_bad' => $good,
            'reviewer_id' => Auth::id(),
            'task_id' => $task_id,
          ]);
        }
      }
      return response()->json(['success'=>$performer_id]);
  }

}
