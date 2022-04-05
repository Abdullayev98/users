<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskIndexResource;
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

    /**
     * @OA\Get(
     *     path="/api/search-task",
     *     tags={"Search"},
     *     summary="Get list of Tasks and Categories",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *          response=500,
     *          description="Server error"
     *     )
     * )
     */
    public function task_search(){

        $tasks = Task::withTranslations(['ru', 'uz'])->orderBy('id','desc')->paginate(20);
        $categories = Category::withTranslations(['ru', 'uz'])->get();

        return response()->json([
            'data' => [
                'tasks' => TaskIndexResource::collection($tasks),
                'categories' => $categories
            ]
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/tasks-search",
     *     tags={"Search"},
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
        return TaskIndexResource::collection($data);
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
        return view('searchTask.task_search', compact('tasks','s','a','p','categories'));

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


    /**
     * @OA\Get(
     *     path="/api/detailed-tasks/{task}",
     *     tags={"Search"},
     *     summary="Get Task by ID",
     *     @OA\Parameter(
     *          in="path",
     *          name="task",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *     )
     * )
     *
     */
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
        return view('searchTask.changetask', compact('task'));
    }

    /**
     * @OA\DELETE(
     *     path="/api/delete-task/{task}",
     *     tags={"Search"},
     *     summary="Delete Task",
     *     security={
     *         {"token": {}}
     *     },
     *     @OA\Parameter(
     *          in="path",
     *          name="task",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *     )
     * )
     */
    public function delete_task(Task $task)
    {
        if ($task->user_id != auth()->user()->id){
            abort(403);
        }
        $task->responses()->delete();
        $task->reviews()->delete();
        $task->custom_field_values()->delete();
        $task->delete();
        return response()->json('O`chirildi');
    }

/**
     *
     * @OA\Post (
     *     path="/api/ajax-request",
     *     tags={"Search"},
     *     summary="Add new task",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="status",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="performer_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="task_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="response_desc",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="comment",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="name_task",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="user_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="good",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="notificate",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="response_time",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="response_price",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "status":2,
     *                     "performer_id":77,
     *                     "task_id":12,
     *                     "response_desc":"Assalomu Aleykum",
     *                     "comment":"Яхшимислар",
     *                     "name_task":"Янги задача",
     *                     "user_id":77,
     *                     "good":"Яхши",
     *                     "notificate":"Salom",
     *                     "response_time":"77",
     *                     "response_price":"300",
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="status", type="integer", example=1),
     *              @OA\Property(property="performer_id", type="integer", example=20),
     *              @OA\Property(property="task_id", type="integer", example=12),
     *              @OA\Property(property="response_desc", type="string", example="Assalomu Aleykum"),
     *              @OA\Property(property="comment", type="string", example="Яхшимислар"),
     *              @OA\Property(property="name_task", type="string", example="Янги задача"),
     *              @OA\Property(property="user_id", type="integer", example=2),
     *              @OA\Property(property="good", type="string", example="Яхши"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      ),
     *     security={
     *         {"token": {}}
     *     },
     * )
     */
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
