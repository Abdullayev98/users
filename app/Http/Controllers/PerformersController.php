<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\WalletBalance;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
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
    public function performer_chat($id)
    {

        $wallet1 = WalletBalance::where('user_id', $id)->first();
        $wallet2 = WalletBalance::where('user_id', auth()->user()->id)->first();
        if ($wallet1 == null || $wallet2 == null) {
            return redirect()->back();
        }
        if ($wallet1->balance >= 4000 and $wallet2->balance >= 4000) {
            return redirect()->route('chat', ['id' => $id]);
        } else {
            return redirect()->back();
        }
    }

    public function service( User $user,Request $request)
    {
        $tasks = Task::where('user_id', Auth::id())->get();

        $users = User::where('role_id', 2)->orderbyDesc('reviews')->paginate(50);
        $task_count =$user->performer_tasks_count;
        $about = User::where('role_id', 2)->orderBy('reviews', 'desc')->take(20)->get();
        return view('Performers/performers', compact('users', 'tasks' ,'about','task_count' ));
    }



    public function performer(User $user, Request $request)
    {
        setView($user);
        $task_count = $user->performer_tasks_count;
        $about = User::where('role_id', 2)->orderBy('reviews', 'desc')->take(20)->get();
        $reviews = $user->reviews()->get();
        return view('Performers/executors-courier', compact('reviews', 'about', 'user', 'task_count'));
    }


    public function give_task(Request $request)
    {
        if ($request->input('user_id') != null) {
            $request->session()->put('given_id', $request->input('user_id'));
        }

        $task_id = $request->input('task_id');
        $task_name = Task::where('id', $task_id)->first();
        if (isset($task_id)) {
            $users_id = $request->session()->pull('given_id');
            $notification = Notification::create([
                'user_id' => $users_id,
                'task_id' => $task_id,
                'name_task' => $task_name->name,
                'description' => '123',
                'type' => 4,
            ]);
            return response()->json(['success' => $users_id]);
        }
        return response()->json(['success' => '$users_id']);
    }


    public function perf_ajax($cf_id)
    {
        // $str = "1,2,3,4,5,6,7,8";
        // $cat_arr = explode(",",$str);
        //dd(array_search($id,$cat_arr));

        // $users = User::where('role_id',2)->paginate(50);

        // return $users;

        $categories = Category::get();
        $cur_cat = Category::where('id', $cf_id)->get();
        $child_categories = Category::get();
        $users = User::where('role_id', 2)->paginate(50);
        $tasks = Task::where('user_id', Auth::id())->get();

        return view('Performers/performers_cat', compact('child_categories', 'categories', 'users', 'cf_id', 'cur_cat', 'tasks'));

    }

    public function deleteNotification(Notification $notification)
    {
        $notification->delete();
        return redirect()->route('searchTask.task', $notification->task_id);
    }

    public function del_all_notif()
    {
        Notification::where('user_id', Auth::id())->delete();
        return response()->json(['success']);
    }

}
