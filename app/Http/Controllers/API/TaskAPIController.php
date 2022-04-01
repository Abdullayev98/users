<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;
use App\Models\User;
use App\Services\Task\CreateService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use TCG\Voyager\Models\Category;
use App\Models\CustomFieldsValue;

class TaskAPIController extends Controller
{

    public function __construct()
    {
        $this->service = new CreateService();

    }
    /**
     * @OA\Get(
     *     path="/api/task/{task}",
     *     tags={"Task"},
     *     summary="Show tasks by ID",
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
    public function task(Task $task)
    {
        return response()->json($task);
    }

    /**
     * @OA\Get(
     *     path="/api/my-tasks",
     *     tags={"Task"},
     *     summary="Get list of my Tasks",
     *     security={
     *      {"token": {}},
     *     },
     *     @OA\Response(
     *          response=200,
     *          description="successful operation",
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *     )
     * )
     */
    public function my_tasks()
    {
        $user = auth()->user();
        $tasks = $user->tasks;
        $perform_tasks = $user->performer_tasks;
        $datas = new Collection(); //Create empty collection which we know has the merge() method
        $datas = $datas->merge($tasks);
        $datas = $datas->merge($perform_tasks);

        return response()->json([
            'data' => [
                'tasks' => $tasks,
                'perform_tasks' => $perform_tasks,
                'datas' => $datas
            ]
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/find",
     *     tags={"Task"},
     *     summary="Get list in Tasks",
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
    public function search(Request $request)
    {
        $s = $request->s;
        $data = Task::where('name', 'LIKE', "%$s%")->orderBy('name')->paginate(10);
        return response()->json($data);
    }


    /**
     * 
     * @OA\Post (
     *     path="/api/task/create",
     *     tags={"Task"},
     *     summary="Add new task",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="address",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="date_type",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="start_date",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="end_date",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="budget",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="description",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="category_id",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="phone",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"Javoxir",
     *                     "address":"Xorazm",
     *                     "date_type":"1",
     *                     "start_date":"2021-05-17 10:00",
     *                     "end_date":"2021-05-17 10:00",
     *                     "budget":10000,
     *                     "description":"Juda zo`r",
     *                     "category_id":"31",
     *                     "phone":"909598654",
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="name", type="string", example="name"),
     *              @OA\Property(property="address", type="string", example="address"),
     *              @OA\Property(property="date_type", type="string", example="1"),
     *              @OA\Property(property="start_date", type="string", example="2021-05-17 00:00"),
     *              @OA\Property(property="end_date", type="string", example="2021-05-17 00:00"),
     *              @OA\Property(property="budget", type="integer", example="100000"),
     *              @OA\Property(property="description", type="string", example="Zo`r"),
     *              @OA\Property(property="category_id", type="integer", example="35"),
     *              @OA\Property(property="phone", type="string", example="909598654"),
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
    public function create(StoreRequest $request)
    {
        $data = $request->validated();
        $data["user_id"] = auth()->user()->id;
        $result = Task::create($data);
        if ($result)
            return response()->json([
                'message' => 'Created successfuly',
                'success' => true,
                'data' => $result
            ]);
        return response()->json([
            'message' => 'Something wrong',
            'success' => false,
        ]);
    }


    /**
     * 
     * @OA\Put (
     *     path="/api/change-task/{task}",
     *     tags={"Task"},
     *     summary="Update Task",
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="phone",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="description",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="date_type",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="start_date",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="budget",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="category_id",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="coordinates0",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="location0",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"Javoxir",
     *                     "phone":"+99898745623",
     *                     "description":"Juda zo`r",
     *                     "date_type":"1",
     *                     "start_date":"2021-05-17 10:00",
     *                     "budget":"10000",
     *                     "category_id":"31",
     *                     "coordinates0":"30.65006,35.546057",
     *                     "location0":"31.65006,35.546057",
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="name", type="string", example="name"),
     *              @OA\Property(property="phone", type="string", example="+99898745623"),
     *              @OA\Property(property="description", type="string", example="Zo`r"),
     *              @OA\Property(property="date_type", type="string", example="1"),
     *              @OA\Property(property="start_date", type="string", example="2021-05-17 00:00"),
     *              @OA\Property(property="budget", type="string", example="100000"),
     *              @OA\Property(property="category_id", type="integer", example="35"),
     *              @OA\Property(property="coordinates0", type="string", example="30.65006,35.546057"),
     *              @OA\Property(property="location0", type="string", example="31.65006,35.546057"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *     security={
     *         {"token": {}}
     *     },
     * )
     */
    public function changeTask(UpdateRequest $request, Task $task){
        taskGuard($task);
        $data = $request->validated();
        $data = getAddress($data);
        $task->update($data);
        $this->service->syncCustomFields($task);

        return response()->json(['success' => true, 'message' => 'Successfully Updated', 'task' => $task]);

    }


    /**
     * @OA\DELETE(
     *     path="/api/for_del_new_task/{task}",
     *     tags={"Task"},
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
    public function deletetask(Task $task)
    {
        $task->delete();
        CustomFieldsValue::where('task_id', $task)->delete();

        if($task){
            return response()->json([
                'success' => true, 
                'message' => 'Successfully Deleted'
            ]);
        }
        return response()->json([
            'success' => false, 
            'message' => 'Not Deleted'
        ], 404);
        
    }
}
