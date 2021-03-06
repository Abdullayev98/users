<?php

namespace App\Services\Task;

use App\Models\Task;
use App\Models\Category;
use App\Models\User;
use App\Models\Compliance;

class SearchService
{
    public function ajaxReq(){
        $tasks = Task::whereIn('status', [1, 2])
            ->orderBy('id', 'desc')
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->join('categories', 'tasks.category_id', '=', 'categories.id')
            ->select('tasks.id', 'tasks.name', 'tasks.address', 'tasks.start_date', 'tasks.end_date', 'tasks.budget', 'tasks.category_id', 'tasks.status', 'tasks.oplata', 'tasks.coordinates', 'users.name as user_name', 'users.id as userid', 'categories.name as category_name', 'categories.ico as icon')
            ->get()->load('responses');
        return $tasks->all();
    }

    public function comlianse_saveS($request){
        $comp = new Compliance();
        $comp->compliance_type_id=$request->input('c_type');
        $comp->text=$request->input('c_text');
        $comp->user_id=$request->input('userId');
        $comp->task_id=$request->input('taskId');
        $comp->save();
    }
}
