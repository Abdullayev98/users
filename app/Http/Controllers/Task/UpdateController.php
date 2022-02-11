<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\CustomFieldsValue;
use App\Models\Task;
use App\Services\Payme\Request;
use App\Services\Task\CreateService;
use Illuminate\Support\Arr;
use RealRashid\SweetAlert\Facades\Alert;

class UpdateController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new CreateService::class;
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


    public function sendReview(Request $request){

        return 23423;
    }



}
