<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\CustomFieldsValue;
use App\Models\Task;
use App\Review;
use Illuminate\Http\Request;
use App\Services\Task\CreateService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use RealRashid\SweetAlert\Facades\Alert;

class UpdateController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new CreateService();
    }

    public function __invoke(UpdateRequest $request, Task $task)
    {
        $data = $request->validated();
        $data = $this->getAddress($data);
        $task->update($data);
        $this->service->syncCustomFields($task);
        Alert::success('Success');

        return redirect()->route('tasks.detail', $task->id);


    }

    public function getAddress($data){
        $address['location'] = $data['address'];
        $address['latitude'] = explode(',',$data['coordinates'])[0];
        $address['longitude'] = explode(',',$data['coordinates'])[1];
        $data['address'] = $address;
        return $data;
    }





    public function completed(Task $task){
        $data = [
            'status' => Task::STATUS_COMPLETE
        ];
        $task->update($data);

        Alert::success('Success');

        return back();

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
            if($task->user_id == auth()->id()){
                $review->user_id = $task->performer_id;
            }else{
                $review->user_id = $task->user_id;
            }
            $review->save();
        }catch (Exception $exception){
            DB::rollBack();
        }
        DB::commit();
        return back();
    }



}
