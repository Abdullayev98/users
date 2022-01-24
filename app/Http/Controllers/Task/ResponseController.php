<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Response;
use App\Models\Task;
use Illuminate\Http\Request;

class ResponseController extends Controller
{


    public function store(Request $request, Task $task)
    {
        $data = $request->validate([
            'description' => 'required|string',
            'budget' => 'required|int',
        ]);
        $data['notification_on'] = $request->notification_on ? 1 : 0;
        $data['task_id'] = $task->id;
        $data['user_id'] = auth()->user()->id;
        $response = Response::create($data);
        return back();
    }


}
