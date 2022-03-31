<?php

namespace App\Services\Task;

use App\Models\CustomFieldsValue;
use Illuminate\Support\Arr;

class CreateService
{

    public function syncCustomFields($task){
        $task->custom_field_values()->delete();
        $this->attachCustomFields($task);

    }


    public function attachCustomFields($task){
        foreach ($task->category->custom_fields as $data) {
            $value = new CustomFieldsValue();
            $value->task_id = $task->id;
            $value->custom_field_id = $data->id;
            $arr = $data->name !== null ? Arr::get(request()->all(), $data->name):null;
            $value->value = is_array($arr) ? json_encode($arr) : $arr;
            $value->save();
        }
    }
    public function attachCustomFieldsByRoute($task, $routeName){
        foreach ($task->category->custom_fields()->where('route',$routeName)->get() as $data) {
            $value = $task->custom_field_values()->where('custom_field_id', $data->id)->first()?? new CustomFieldsValue();
            $value->task_id = $task->id;
            $value->custom_field_id = $data->id;
            $arr = $data->name !== null ? Arr::get(request()->all(), $data->name):null;
            $value->value = is_array($arr) ? json_encode($arr) : $arr;
            $value->save();
        }
    }


    public function addAdditionalAddress($request){
        $data = [];
        $data_inner = [];
        for ($i = 0; $i < setting('site.max_address')??10; $i++) {
            $location = Arr::get($request->all(), 'location' . $i);
            $coordinates = Arr::get($request->all(), 'coordinates' . $i);
            if ($coordinates) {
                $data_inner['location'] = $location;
                $data_inner['longitude'] = explode(',', $coordinates)[1];
                $data_inner['latitude'] = explode(',', $coordinates)[0];
                if ($i != 0) {
                    $data[] = $data_inner;
                } else {
                    $dataMain['address'] = json_encode($data_inner);
                }
            }
        }
        $dataMain['address_add'] = $data;
        return $dataMain;

    }


}
