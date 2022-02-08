<?php

namespace App\Http\Controllers\Task;

use App\Http\Requests\Task\UpdateRequest;
use App\Models\WalletBalance;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\Task;
use App\Models\Notification;
use App\Models\TaskResponse;
use App\Models\Response;
use TCG\Voyager\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;


class SearchTaskController extends VoyagerBaseController
{
    public function task_search()
    {
//        $task = Task::orderBy('id','desc')->where('status',null)->count();
//        $categories = Category::get()->all();
//        return view('task.search', compact('tasks','categories'));
        return view('task.search');
    }

    public function ajax_tasks(Request $request)
    {
        if (isset($request->orderBy)) {
            if ($request->orderBy == 'all') {
                $tasks = DB::table("tasks")->where('status', '=', 1)->orderBy('id', 'desc')
                    ->join('users', 'tasks.user_id', '=', 'users.id')
                    ->join('categories', 'tasks.category_id', '=', 'categories.id')
                    ->select('tasks.id', 'tasks.name', 'tasks.address', 'tasks.start_date', 'tasks.budget', 'tasks.category_id', 'tasks.oplata', 'tasks.coordinates', 'users.name as user_name', 'categories.name as category_name', 'categories.ico as icon')
                    ->get();
            }
            if ($request->orderBy == 'sroch') {
                $tasks = DB::table("tasks")->where('status', '=', 1)->orderBy('start_date', 'asc')
                    ->join('categories', 'tasks.category_id', '=', 'categories.id')
                    ->select('tasks.*', 'categories.name as category_name', 'categories.ico as icon')
                    ->get();
            }
            if ($request->orderBy == 'udal') {
                $tasks = DB::table("tasks")->where([['address', '=', null], ['status', '=', null]])
                    ->orderBy('id', 'desc')
                    ->join('categories', 'tasks.category_id', '=', 'categories.id')
                    ->select('tasks.*', 'categories.name as category_name', 'categories.ico as icon')
                    ->get();
            }
//            if ($request->orderBy == 'klyuch') {
////                $filter = $request->fltr;
//                $tasks =  DB::table("tasks")->where('name','LIKE',"%$filter%")->orderBy('name','desc')->get();
//            }
//            if ($request->orderBy == 'price') {
////                $filter = $request->fltr;
//                $tasks =  DB::table("tasks")->where('budget','LIKE',"%$filter%")->orderBy('name','desc')->get();
//            }
        }
        return $tasks->all();
    }

    public function my_tasks()
    {
        $tasks = Task::where('user_id', auth()->id())->get();
        $perform_tasks = Task::where('performer_id', auth()->id())->get();
        $all_tasks = Task::where('user_id', Auth::id())->where('performer_id', Auth::id())->get();
        $categories = Category::get();
        return view('/task/mytasks', compact('tasks', 'categories', 'perform_tasks', 'all_tasks'));
    }

    public function search(Request $request)
    {
        $s = $request->s;
        $a = $request->a;
        $p = $request->p;
        // dd($s);
        if ($request->s) {
            $tasks = Task::where('name', 'LIKE', "%$s%")->orderBy('name')->paginate(10);
        } elseif ($request->a) {
            $tasks = Task::where('address', 'LIKE', "%$a%")->orderBy('name')->paginate(10);
        } elseif ($request->p) {
            $tasks = Task::where('budget', 'LIKE', "%$p%")->orderBy('name')->paginate(10);
        } else {
            $tasks = Task::where('name', 'LIKE', "%$s%")->orWhere('address', 'LIKE', "%$a%")->orWhere('budget', 'LIKE', "%$p%")->orderBy('name')->paginate(10);
        }
        $categories = Category::all();
        return view('task.search', compact('tasks', 's', 'a', 'p', 'categories'));

    }

    public function task(Task $task)
    {
        $balance = WalletBalance::where('user_id', Auth::id())->first();
        if ($balance) {
            $balance = $balance->balance;
        } else {
            $balance = 0;
        }

        $users = User::all();


        $arr = get_defined_vars();

        if (Arr::exists($arr, 'response_users')) {
            return view('task.detailed-tasks', compact('task',  'users',));
        } else {
            return view('task.detailed-tasks', compact('task',  'users',  'balance'));
        }

    }

    public function task_response(Request $request)
    {
        $status = $request->input('status');
        $performer_id = $request->input('performer_id');
        $task_id = $request->input('task_id');
        $description = $request->input('response_desc');
        $comment = $request->input('comment');
        $name_task = $request->input('name_task');
        $users_id = $request->input('user_id');
        $good = $request->input('good');
        if ($status) {
            if ($status == 4) {
                Task::where('id', $task_id)->update([
                    'status' => $status
                ]);
            } elseif ($status == 3) {
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
        }
        if ($description) {
            $notificate = $request->input('notificate');
            $response_time = $request->input('response_time');
            $response_price = $request->input('response_price');
            $task_id = $request->input('task_id');
            TaskResponse::create([
                'user_id' => Auth::id(),
                'task_id' => $task_id,
                'description' => $description,
                'notificate' => $notificate,
                'time' => $response_time,
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
        if ($comment) {
            if (Auth::id() == $users_id) {
                Review::create([
                    'user_id' => $performer_id,
                    'description' => $comment,
                    'good_bad' => $good,
                    'reviewer_id' => Auth::id(),
                    'task_id' => $task_id,
                ]);
                $user_reviews_good = Review::where('user_id', $performer_id)->where('good_bad', 1)->count();
                $user_reviews_bad = Review::where('user_id', $performer_id)->where('good_bad', 0)->count();
                $all_count = $user_reviews_good - $user_reviews_bad;
                User::where('id', $performer_id)->update([
                    'reviews' => $all_count
                ]);
            } else {
                Review::create([
                    'user_id' => $users_id,
                    'description' => $comment,
                    'good_bad' => $good,
                    'reviewer_id' => Auth::id(),
                    'task_id' => $task_id,
                ]);
                $user_reviews_good = Review::where('user_id', $users_id)->where('good_bad', 1)->count();
                $user_reviews_bad = Review::where('user_id', $users_id)->where('good_bad', 0)->count();
                $all_count = $user_reviews_good - $user_reviews_bad;
                User::where('id', $users_id)->update([
                    'reviews' => $all_count
                ]);
            }
        }
        return response()->json(['success' => $all_count]);
    }

    public function delete_task(Task $task)
    {
        DB::delete('DELETE FROM tasks WHERE id = ?', [$task->id]);
        echo("User Record deleted successfully.");
        return redirect('/');
    }

    public function change_task(Task $task)
    {
        $categories = Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get();
        $categories2 = Category::withTranslations(['ru', 'uz'])->where('parent_id', "!=", null)->get();
        return view('task.changetask', compact('categories', 'categories2', 'task', ));
    }

    public function update_task(Task $task, UpdateRequest $request)
    {

        $data = $request->validated();
        $task->update($data);

        dd($data);

    }
}
