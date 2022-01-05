<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
    public function create(Request $request)
    {
        $rule =[
            'name' => 'required',
            'address' => 'required',
            'date_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'budget' => 'required',
            'description' => 'required',
            'category_id' => 'required|numeric',
        ];
        $rule['phone'] = [
            'required',
            'regex:/^\+998(9[012345789])[0-9]{7}$/',
        ];
        $validated = $request->validate($rule);
        $result = Task::create($validated);
        if ($result)
            return [
                'message' => 'Created successfuly',
                'success' => true,
            ];
        return [
            'message' => 'Something wrong',
            'success' => false,
        ];
    }
}
