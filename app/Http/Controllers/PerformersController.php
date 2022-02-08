<?php

namespace App\Http\Controllers;

use App\Models\Response;
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

    public function service(Request $request)
    {
        $tasks = Task::where('user_id', Auth::id())->get();

        $users = User::where('role_id', 2)->orderbyDesc('reviews')->paginate(50);
        return view('Performers/performers', compact('users', 'tasks'));
    }

    public function performer(User $id, Request $request)
    {
        $user = $id;
        $view = UserView::query()->where('performer_id', $user->id);

        if (auth()->check()) {
            $view->where('user_id', \auth()->user()->id);
        }
        $view->first();

        if (!$view) {
            $view = new UserView();
            $view->user_id = \auth()->user()->id;
            $view->performer_id = $user->id;
            $view->save();
        }
        $views = count(UserView::query()->where('performer_id', $user->id)->get());
        $categories = Category::withTranslations(['ru', 'uz'])->get();
        $child_categories = Category::withTranslations(['ru', 'uz'])->get();
        $task_count = Task::where('performer_id', $user->id)->count();
        $tasks = Task::get();
        $reviews = Review::get();
        $reviews_count = Review::where('user_id', $user->id)->count();
        $review_users = User::get();
        $about = User::where('role_id', 2)->orderBy('reviews', 'desc')->take(20)->get();
        return view('Performers/executors-courier', compact('about', 'reviews_count', 'user', 'views', 'tasks', 'categories', 'child_categories', 'task_count', 'reviews', 'review_users'));
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

    public function del_notif(Notification $notification, Task $task)
    {
        $balance = WalletBalance::where('user_id', Auth::id())->first();
        if ($balance) {
            $balance = $balance->balance;
        } else {
            $balance = 0;
        }
        $same_tasks = $task->category->tasks;

        $users = User::all();
        $current_user = $task->user;
        $task_responses = $task->responses;
        $response_count = $task_responses->count();
        $response_count_user = auth()->user()->responses->count();

        return view('task.detailed-tasks', compact('response_count_user', 'response_count', 'task', 'same_tasks', 'users', 'current_user', 'balance', 'task_responses'));
    }

    public function del_all_notif()
    {
        Notification::where('user_id', Auth::id())->delete();


        return response()->json(['success']);
    }

}
