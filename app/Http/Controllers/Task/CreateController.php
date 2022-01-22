<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use App\Models\UserVerify;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PlayMobile\SMS\SmsService;
use TCG\Voyager\Models\Category;

class CreateController extends Controller
{

    public function name(Request $request){

        $current_category =Category::findOrFail($request->category_id);
        $task = new Task();
        $task->category_id = $current_category->id;
        $task->save();

        return view("create.name", compact( 'task'));


    }

    public function custom(Request $request, Task $task){


        $data = $request->validate([
            'name' => 'required|string'
        ]);
        $task->update($data);




        return redirect()->route("task.create.address", $task->id);
    }


    public function address(Task $task){
        return view('create.location', compact('task'));

    }

    public function address_store(Request $request, Task $task){
//        dd($request->all());

        $data = [];
        $data_inner = [];
        for ($i=0; $i < 5; $i++){
            $location = Arr::get($request->all(), 'location'.$i);
            $coordinates = Arr::get($request->all(), 'coordinates'.$i);
            if ($coordinates)
            {
                $data_inner['location'] = $location;
                $data_inner['longitude'] = explode(',', $coordinates)[1];
                $data_inner['latitude'] = explode(',', $coordinates)[0];
                if ($i!=0){
                    $data[] = $data_inner;
                }else{
                    $task->address = json_encode($data_inner);
                }
            }
        }
        $task->address_add  = json_encode($data);
        $task->save();

        return redirect()->route("task.create.date", $task->id);

    }
    public function date(Task $task){
        return view('create.date', compact('task'));

    }
    public function date_store(Request $request, Task $task){
        $start_time = $request->start_date." ".$request->start_time;
        $end_time = $request->end_date." ".$request->end_time;

        switch ($request->date_type){
            case 1:$task->start_date = Carbon::create($start_time);break;
            case 2: $task->end_date = Carbon::create($end_time);break;
            case 3: $task->start_date = Carbon::create($start_time); $task->end_date =Carbon::create($end_time);break;
        }

        $task->date_type = $request->date_type;
        $task->save();

        return redirect()->route('task.create.budget', $task->id);

    }

    public function budget(Task $task){
        $category = Category::findOrFail($task->category_id);

        return view('create.budget', compact('task', 'category'));
    }

    public function budget_store(Task $task, Request $request){
        $task->budget = $request->amount1;
        $task->save();

        return redirect()->route('task.create.note',$task->id );

    }

    public function note(Task $task){
        return view('create.notes', compact('task'));
    }

    public function note_store(Task $task, Request $request){
        $data = $request->validate([
            'description' => 'required|string',
            'docs'=>'required',
            'oplata' => 'required'
        ]);
        $task->update($data);
        return redirect()->route("task.create.contact", $task->id);
    }
    public function contact(Task $task){
        return view('create.contacts', compact('task'));
    }

    public function contact_store(Task $task, Request $request){
//        dd($request->all());
        if (!auth()->check()){
            $data = $request->validate([
                'name'=> 'required|string',
                'email' => 'required|email',
                'phone_number'=> 'required',
            ]);
            $data['password'] = bcrypt('login123');
            $user = User::create($data);
        }else{
            $user = auth()->user();
            $data = $request->validate(['phone_number'=>'required']);
            $user->update($data);
            $user->fresh();
        }
        auth()->login($user);

        $task->status = 1;
        $task->save();
        $user->phone_number = str_replace('998','', preg_replace('/[^0-9]/', '', $user->phone_number)    );
        $user->save();

        if (!$user->is_email_verified){
            $sms_otp = rand(100000,999999);
            $token   = Str::random(64);
            UserVerify::create([
                'user_id' => $user->id,
                'token' => $token,
                'sms_otp' => $sms_otp
            ]);
            $response = (new SmsService())->send(preg_replace('/[^0-9]/', '', $user->phone_number), $sms_otp);
            return redirect()->route('task.create.verify');
        }


        $task->user_id = $user->id;
        $task->save();
        return redirect('/profile');

    }

    public function verify(){
        return view('create.verify');
    }

}
