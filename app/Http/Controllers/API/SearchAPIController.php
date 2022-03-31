<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Google\Service\CustomSearchAPI\Search;
use App\Services\Task\SearchService;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use App\Models\CustomFieldsValue;
use App\Models\Notification;
use App\Models\TaskResponse;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\CompliancesType;

class SearchAPIController extends Controller
{

    public function __construct()
    {
        $this->service = new SearchService();

    }

    public function task_search(){

        $tasks = Task::withTranslations(['ru', 'uz'])->orderBy('id','desc')->paginate(20);
        $categories = Category::withTranslations(['ru', 'uz'])->get();

        return response()->json([
            'data' => [
                'tasks' => $tasks,
                'categories' => $categories
            ]
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/tasks-search",
     *     tags={"Ajax-Search-Tasks"},
     *     summary="Get list of Tasks",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *          response=500,
     *          description="Ajax error"
     *     )
     * )
     */
    public function ajax_tasks()
    {
        // $search = new SearchService();
        $data = $this->service->ajaxReq();
        return response()->json($data);
    }

    public function my_tasks(){
        $tasks = Task::where('user_id', auth()->id());
        return response()->json($tasks);
    }

    /* public function search(Request $request){
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

    } */

    /* public function task($id){
        $tasks = Task::where('id',$id)->first();
        $cat_id = $tasks->category_id;
        $user_id = $tasks->user_id;
        $same_tasks = Task::where('category_id',$cat_id)->get();

        $users = User::all();
        $current_user = User::find($user_id);
        $categories = Category::where('id',$cat_id)->get();
        // dd($current_user);
        return view('task.detailed-tasks',compact('tasks','same_tasks','users','categories','current_user'));
    } */

    public function task(Task $task)
    {
        $complianceType = CompliancesType::all();
        $review = null;
        if ($task->reviews_count == 2) $review == true;
        if (auth()->check()){
            $task->views++;
            $task->save();
        }
        return response()->json([
            'data' => [
                'task' => $task,
                'review' => $review,
                'complianceType' => $complianceType
            ]
        ]);
    }

    public function comlianse_save(Request $request){
        $comp = new SearchService();
        $comp->comlianse_saveS($request);
        return redirect()->back();
    }

    public function changeTask(Task $task)
    {
        taskGuard($task);
        return view('task.changetask', compact('task'));
    }

    public function delete_task(Task $task)
    {
        taskGuard($task);
        $task->responses()->delete();
        $task->reviews()->delete();
        $task->custom_field_values()->delete();
        $task->delete();
        return response()->json('O`chirildi');
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
    

}
