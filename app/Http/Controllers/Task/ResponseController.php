<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskResponse;
use App\Models\WalletBalance;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ResponseController extends Controller
{


    public function store(Request $request, Task $task)
    {

        $data = $request->validate([
            'description' => 'required|string',
            'price' => 'required|int',
        ]);
        $data['notificate'] = $request->notificate ? 1 : 0;
        $data['task_id'] = $task->id;
        $data['user_id'] = $task->user_id;
        $data['creator_id'] = auth()->user()->id;
        if ($request->pay == 0) {
            $data['not_free'] = 0;
        } else {
            $data['not_free'] = 1;
        }

        $ballance = WalletBalance::where('user_id', auth()->user()->id)->first();
        if ($ballance) {
            if ($ballance->balance < 4000) {
                Alert::error("Balance", 'Hisobingizda yetarli mablag\' mavjud emas!');
            } else {
                Alert::success("Success", 'asdweqweqw');
                $ballance->balance = $ballance->balance - $request->pay;
                $ballance->save();
                TaskResponse::create($data);
            }
        } else {

            Alert::error("Balance", 'Hisobingizda yetarli mablag\' mavjud emas!');

        }
        return back();

    }


    public function selectPerformer(TaskResponse $response)
    {
        if ($response->task->status >= 3) {
            abort(403);
        }
        $data = [
            'performer_id' => $response->user_id,
            'status' => Task::STATUS_IN_PROGRESS
        ];
        $response->task->update($data);
        Alert::success('Success');
        return back();
    }


}
