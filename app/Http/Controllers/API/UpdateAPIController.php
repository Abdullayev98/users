<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\CustomFieldsValue;
use App\Models\Notification;
use App\Models\Task;
use App\Review;
use Illuminate\Http\Request;
use App\Services\Task\CreateService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UpdateAPIController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new CreateService();
    }

    public function __invoke(UpdateRequest $request, Task $task)
    {
        taskGuard($task);
        $data = $request->validated();
        $data = getAddress($data);
        $task->update($data);
        $this->service->syncCustomFields($task);
        Alert::success('Success');

        return response()->json(['message'=> 'Success']); //redirect()->route('searchTask.task', $task->id);


    }

    public function completed(Task $task){
        $data = [
            'status' => Task::STATUS_COMPLETE
        ];
        $task->update($data);

        Alert::success('Success');

        return response()->json(['message'=> 'Success']);  //back();

    }


    public function sendReview(Task $task, Request $request){
        DB::beginTransaction();
//        dd($request->all());
        try {
            $task->status = $request->input('status');
            $l1 = Review::where('reviewer_id', $task->user_id)->where('user_id', $task->performer_id)->orWhere('reviewer_id', $task->performer_id)->where('user_id', $task->user_id)->count();
            if($l1 == 1){
                $task->save();
            }
            $review = new Review();
            $review->description = $request->comment;
            $review->good_bad = $request->good;
            $review->task_id = $task->id;
            $review->reviewer_id = auth()->id();
            if ($task->reviews_count==2) $task->status = Task::STATUS_COMPLETE;
            if($task->user_id == auth()->id()){
                $review->user_id = $task->performer_id;
            }else{
                $review->user_id = $task->user_id;
            }
            Notification::create([
                'user_id' => $task->user_id,
                'task_id' => $task->id,
                'name_task' => $task->name,
                'description' => 1,
                'type' => 2
            ]);
            $review->save();
        }catch (Exception $exception){
            DB::rollBack();
        }
        DB::commit();
        return response()->json($task);  //back();
    }



}
