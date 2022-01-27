<?php

namespace App\Http\Controllers;

use App\Models\WalletBalance;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use App\Models\User;
use App\Models\BrowsingHistory;
use App\Models\PostView;
use App\Models\UserView;
use Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\Task;
use App\Models\Notification;
use App\Events\MyEvent;
use Illuminate\Support\Facades\Auth;


class PerformersController extends Controller
{
    public  function performer_chat($id){

        $wallet1 = WalletBalance::where('user_id',$id)->first();
        $wallet2 = WalletBalance::where('user_id',auth()->user()->id)->first();
        if ($wallet1 == null || $wallet2==null){
            return redirect()->back();
        }
        if ($wallet1->balance>=4000 and $wallet2->balance>=4000 ){
            return redirect()->route('chat',['id'=>$id]);
        }else{
            return redirect()->back();
        }



    }
    public function service(Request $request)
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        $categories = DB::table('categories')->get();
        $child_categories= DB::table('categories')->get();
        $users= User::where('role_id',2)->paginate(50);

        return view('Performers/performers',compact('child_categories','categories','users','tasks'));
    }
    public function performer($id){

        if(session('view_count') == NULL){

            $def_count = UserView::where('user_id', $id)->first();

            if(isset($def_count)){

            $ppi = $def_count->count + 1;

                UserView::where('user_id', $id)->update(['count' => $ppi]);

        }else{

            UserView::create([
                'user_id'=> $id,
                'count'=> 1,
            ]);

        }
        session()->put('view_count', '1');
        }
        $vcs = UserView::where('user_id', $id)->get();
        $users= User::where('id',$id)->get();
        $categories = DB::table('categories')->get();
        $child_categories = DB::table('categories')->get();
        $task_count = Task::where('user_id', Auth::id())->count();
        $tasks = Task::get();
        $reviews = Review::get();
        $reviews_count = Review::where('user_id', $id)->count();
        $review_users= User::get();
        return view('Performers/executors-courier',compact('reviews_count','tasks','users','categories','child_categories','vcs','task_count','reviews','review_users'));
    }


public function give_task(Request $request){
    if ($request->input('user_id') != null) {
        $request->session()->put('given_id', $request->input('user_id'));
    }

    $task_id = $request->input('task_id');
    $task_name = Task::where('id', $task_id)->first();
    if (isset($task_id)){
        $users_id = $request->session()->pull('given_id');
            $notification = Notification::create([
                'user_id'     => $users_id,
                'task_id'     => $task_id,
                'name_task'   => $task_name->name,
                'description' => '123',
                'type'        => 4,
            ]);
        return response()->json(['success'=>$users_id]);
    }
    return response()->json(['success'=>'$users_id']);
}


public function perf_ajax($cf_id){
    // $str = "1,2,3,4,5,6,7,8";
    // $cat_arr = explode(",",$str);
    //dd(array_search($id,$cat_arr));

    // $users = User::where('role_id',2)->paginate(50);

    // return $users;

    $categories = DB::table('categories')->get();
    $cur_cat = DB::table('categories')->where('id',$cf_id)->get();
    $child_categories= DB::table('categories')->get();
    $users= User::where('role_id',5)->paginate(50);

    return view('Performers/performers_cat',compact('child_categories','categories','users','cf_id','cur_cat'));

}

public function del_notif($id,$task_id){
    $balance = WalletBalance::where('user_id',Auth::id())->first();
    if ($balance){
        $balance =  $balance->balance;
    }else{
        $balance = 0;
    }
    Notification::where('id',$id)->delete();

    $tasks = Task::where('id',$task_id)->first();
    $cat_id = $tasks->category_id;
    $user_id = $tasks->user_id;
  $same_tasks = Task::where('category_id',$cat_id)->get();

  $users = User::all();
  $current_user = User::find($user_id);
  $categories = Category::where('id',$cat_id)->get();
  // dd($current_user);
  return view('task.detailed-tasks',compact('tasks','same_tasks','users','categories','current_user','balance'));
}

}
