<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;

class TaskAPIController extends Controller
{
    public function task($id)
    {
        $tasks = Task::where('id',$id)->get();

        return response()->json($tasks);
    }
    public function search(Request $request)
    {
        $s = $request->s;
        if ($request->s) {
            $tasks = Task::where('name', 'LIKE', "%$s%")->orderBy('name')->paginate(10);
        }
        return response()->json($tasks);
    }
    public function DateType1(Request $request)
    {
        $request->validate([
            'start_date' => 'required|dateFrom',
            'end_date' => 'required|date'
        ]);
    }
    public function create(Request $request)
    {
        $rule =[
            'address' => 'required',
            'date_type' => 'required'
        ];
        $validated = $request->validate($rule);
        $validated['name'] = $request->user()->name;
        if($rule['date_type'] == 'Начать работу'){
            $validated += $validated['start_date'];
        }elseif($rule['date_type'] == 'Закончить работу'){
            $validated += $validated['end_date'];
        }elseif ($rule['date_type'] == 'Указать период'){
            $validated += $validated['start_date'];
            $validated += $validated['end_date'];
        }
        $result = $validated->save();
        if ($result)
            return [
                'message' => 'Saved',
                'success' => true,
            ];
        return [
            'message' => 'Something wrong',
            'success' => false,
        ];
    }
}
