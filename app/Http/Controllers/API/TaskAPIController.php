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

class TaskAPIController extends Controller
{

    public function __construct()
    {
        $this->service = new CreateService();

    }
    public function task(Task $task)
    {

        return $task;
    }
    public function my_tasks()
    {
        $user = auth()->user();
        $tasks = $user->tasks;
        $perform_tasks = $user->performer_tasks;
        $datas = new Collection(); //Create empty collection which we know has the merge() method
        $datas = $datas->merge($tasks);
        $datas = $datas->merge($perform_tasks);

        return compact('tasks','perform_tasks','datas');
    }

    public function search(Request $request)
    {
        $s = $request->s;
        return   Task::where('name', 'LIKE', "%$s%")->orderBy('name')->paginate(10);
    }

    public function create(StoreRequest $request)
    {
        $data = $request->validated();
        $data["user_id"] = auth()->user()->id;
        $result = Task::create($data);
        if ($result)
            return [
                'message' => 'Created successfuly',
                'success' => true,
                'data' => $result
            ];
        return [
            'message' => 'Something wrong',
            'success' => false,
        ];
    }


    public function changeTask(UpdateRequest $request, Task $task){
        taskGuard($task);
        $data = $request->validated();
        $data = getAddress($data);
        $task->update($data);
        $this->service->syncCustomFields($task);

        return ['success' => true, 'message' => 'Successfully Updated', 'task' => $task];

    }
}
