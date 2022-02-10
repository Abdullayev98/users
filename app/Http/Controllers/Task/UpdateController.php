<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\CustomFieldsValue;
use App\Models\Task;
use App\Services\Payme\Request;
use Illuminate\Support\Arr;
use RealRashid\SweetAlert\Facades\Alert;

class UpdateController extends Controller
{

    public function __invoke(UpdateRequest $request, Task $task)
    {
        $data = $request->validated();
        $data = $this->getAddress($data);
        $task->update($data);

        $this->syncCustomFields($task);

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

    public function syncCustomFields($task){
        $this->deleteAllValues($task);

        foreach ($task->category->custom_fields as $data) {
            $value = new CustomFieldsValue();
            $value->task_id = $task->id;
            $value->custom_field_id = $data->id;
            $arr = Arr::get(request()->all(), $data->name);
            $value->value = is_array($arr) ? json_encode($arr) : $arr;
            $value->save();
        }

    }

    public function deleteAllValues($task){
        foreach ($task->custom_field_values as $custom_fields_value) {
            $custom_fields_value->delete();

        }
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
