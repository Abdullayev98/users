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
}
