<?php

namespace App\Http\Controllers\Task;

use App\Http\Requests\Task\UpdateRequest;
use App\Models\CustomField;
use App\Models\CustomFieldsValue;
use App\Models\WalletBalance;
use Illuminate\Database\Eloquent\Collection;
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
            $tasks = Task::whereIn('status', [1,2])
                    ->orderBy('id', 'asc')
                    ->join('users', 'tasks.user_id', '=', 'users.id')
                    ->join('categories', 'tasks.category_id', '=', 'categories.id')
                    ->select('tasks.id', 'tasks.name', 'tasks.address', 'tasks.start_date', 'tasks.budget', 'tasks.category_id', 'tasks.status', 'tasks.oplata', 'tasks.coordinates', 'users.name as user_name', 'users.id as userid', 'categories.name as category_name', 'categories.ico as icon')
                    ->get();
            }
            if ($request->orderBy == 'klyuch') {
                $filter = $request->fltr;
                $address = $request->addr;
                $price = $request->prc;
                $tasks = Task::whereIn('status', [1,2])
                    ->where('name', 'LIKE', "%$filter%")
                    ->where('address', 'LIKE', "%$address%")
                    ->where('budget', 'LIKE', "%$price%")
                    ->orderBy('id', 'asc')
                    ->select('tasks.id', 'tasks.name', 'tasks.address', 'tasks.start_date', 'tasks.budget', 'tasks.category_id', 'tasks.status', 'tasks.oplata', 'tasks.coordinates', 'tasks.user_id')
                    ->get()->load('user', 'category');
            }
        }
        return $tasks->all();
    }

    public function my_tasks()
    {
        $user = auth()->user();
        $tasks = $user->tasks();
        $perform_tasks = Task::where('performer_id', $user->id())->get();
        $all_tasks = Task::where('user_id', $user->id)->where('performer_id', $user->id)->get();
        $categories = Category::get();
        return view('/task/mytasks', compact('tasks', 'categories', 'perform_tasks', 'all_tasks'));
    }

    public function task(Task $task)
    {
        $review = null;
        if ($task->reviews_count == 2) $review == true;

        return view('task.detailed-tasks', compact('task', 'review'));
    }


    public function selectPerformer(TaskResponse $response){
        dd(23423);

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
            if ($status == 4 || $status == 2) {
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
        $task->delete();
        return redirect('/');
    }

    public function changeTask(Task $task)
    {
        taskGuard($task);

        return view('task.changetask', compact('task'));
    }

    public function update_task(Task $task, UpdateRequest $request)
    {
        taskGuard($task);
        $data = $request->validated();
        $task->update($data);

        dd($data);

    }


}
