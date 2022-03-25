<?php

namespace App\Http\Controllers\Task;

use App\Http\Requests\Task\UpdateRequest;
use App\Models\Compliance;
use App\Models\CompliancesType;
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
use App\Services\Task\SearchService;


class SearchTaskController extends VoyagerBaseController
{
    public function task_search()
    {
//        $task = Task::whereIn('status', [2])
//            ->orderBy('id', 'asc')->get();
//        foreach ($task as $tasks){
//            $otklik = Response::where('task_id', $tasks->id)->count();
//        }

//        dd($task, $otklik);
        return view('task.search');
    }
    public function search(Request $request)
    {
        $s = $request->s;
        return   Task::where('name', 'LIKE', "%$s%")->orderBy('name')->paginate(10);
    }

    public function ajax_tasks()
    {
        $search = new SearchService();
        return $search->ajaxReq();        
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
        $complianceType =CompliancesType::all();
        $review = null;
        if ($task->reviews_count == 2) $review == true;
        if (auth()->check()){
            $task->views++;
            $task->save();
        }
        return view('task.detailed-tasks', compact('task', 'review','complianceType'));
    }

    public function comlianse_save(Request $request){
        $comp = new SearchService();
        $comp->comlianse_saveS($request);
        return redirect()->back();
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
        taskGuard($task);
        $task->responses()->delete();
        $task->reviews()->delete();
        $task->custom_field_values()->delete();
        $task->delete();
        return redirect('/');
    }

    public function changeTask(Task $task)
    {
        taskGuard($task);
//        dd($task);
        return view('task.changetask', compact('task'));
    }



}
