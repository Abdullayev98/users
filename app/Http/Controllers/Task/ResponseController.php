<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Response;
use App\Models\Task;
use App\Models\WalletBalance;
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
        if ($request->pay == 0){
            $data['not_free'] = 0;
        }else{
            $data['not_free'] = 1;
        }
        $response = Response::create($data);
        $ballance = WalletBalance::where('user_id', auth()->user()->id)->first();
        $ballance->balance = $ballance->balance - $request->pay;
//        dd($ballance->balance);
        $ballance->save();
        return back();
    }


}
