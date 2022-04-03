<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Requests\TaskDateRequest;
use App\Http\Requests\UserPhoneRequest;
use App\Http\Requests\UserRequest;
use App\Models\Category;
use App\Models\CustomField;
use App\Models\CustomFieldsValue;
use App\Models\Task;
use App\Models\User;
use App\Services\Task\CreateService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Notification;
use App\Events\MyEvent;

class CreateController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new CreateService();
    }


    public function name(Request $request)
    {

        $current_category = Category::findOrFail($request->category_id);

        return view("create.name", compact('current_category'));


    }

    public function name_store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required'
        ]);
        $task = Task::create($data);
        $this->service->attachCustomFieldsByRoute($task, CustomField::ROUTE_NAME);

        return redirect()->route("task.create.custom.get", $task->id);
    }


    public function custom_get(Task $task)
    {

        if (!$task->category->customFieldsInCustom->count()) {
            return redirect()->route('task.create.address', $task->id);
        }

        return view('create.custom', compact('task'));

    }

    public function custom_store(Request $request, Task $task)
    {
        $this->service->attachCustomFieldsByRoute($task, CustomField::ROUTE_CUSTOM);
        return redirect()->route('task.create.address', $task->id);
    }


    public function address(Task $task)
    {
        return view('create.location', compact('task'));

    }

    public function address_store(Request $request, Task $task)
    {
        $task->update($this->service->addAdditionalAddress($request));


        $this->service->attachCustomFieldsByRoute($task, CustomField::ROUTE_ADDRESS);
        return redirect()->route("task.create.date", $task->id);

    }

    public function date(Task $task)
    {
        return view('create.date', compact('task'));

    }

    public function date_store(TaskDateRequest $request, Task $task)
    {
        $data = $request->validated();
        $task->update($data);
        $this->service->attachCustomFieldsByRoute($task, CustomField::ROUTE_DATE);

        return redirect()->route('task.create.budget', $task->id);
    }

    public function budget(Task $task)
    {
        $category = Category::findOrFail($task->category_id);

        return view('create.budget', compact('task', 'category'));
    }

    public function budget_store(Task $task, Request $request)
    {
        $task->budget = preg_replace('/[^0-9.]+/', '', $request->amount1);
        $task->save();
        $this->service->attachCustomFieldsByRoute($task, CustomField::ROUTE_BUDGET);


        return redirect()->route('task.create.note', $task->id);

    }

    public function note(Task $task)
    {
        return view('create.notes', compact('task'));
    }

    public function images_store(Task $task, Request $request)
    {

        $imgData = json_decode($task->photos);

        if ($request->hasFile('images')) {

            $files = $request->file('images');
            $name = Storage::put('public/uploads', $files);
            $name = str_replace('public/','', $name);
            $imgData[] = $name;

        }

        $task->photos = json_encode($imgData);
        $task->save();
    }

    public function uploadImage(Task $task, Request $request)
    {
        $folder_task = Task::orderBy('created_at', 'desc')->first();
        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')
                ->move(public_path("storage/Uploads/{$folder_task->name}"), $fileName);

            $fileModelname = time() . '_' . $request->file->getClientOriginalName();
            $fileModelfile_path = '/storage/' . $filePath;
            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $fileName
            ]);
        }
        $this->note_store();
    }

    public function note_store(Task $task, Request $request)
    {
        $data = $request->validate([
            'description' => 'required|string',
            'oplata' => 'required',
        ]);
        if ($request['docs'] == "on"){
            $data['docs'] = 1;
        }else{
            $data['docs'] = 0;
        }
        $task->update($data);
        return redirect()->route("task.create.contact", $task->id);
    }


    public function contact(Task $task)
    {
        return view('create.contacts', compact('task'));
    }


    public function contact_store(Task $task, Request $request)
    {
        $data = $request->validate([
            'phone_number' => 'required|integer|min:9'
        ]);
        $user = auth()->user();
        if (!$user->is_phone_number_verified || $user->phone_number != $data['phone_number']) {
            $data['is_phone_number_verified'] = 0;
            $user->update($data);
            LoginController::send_verification('phone',$user);
            return redirect()->route('task.create.verify',  ['task' =>$task->id, 'user' => $user->id]);
        }

        $task->status = 1;
        $task->user_id = $user->id;
        $task->phone = $user->phone_number;
        $task->save();

        // dd($task);
                
        foreach(User::all() as $users){


            $user_cat_ids = explode(",",$users->category_id);
            $check_for_true = array_search($task->category_id,$user_cat_ids);

            if($check_for_true !== false){
            Notification::create([

                'user_id'=>$users->id,
                'description'=> 1,
                'task_id'=>$task->id,
                "cat_id"=>$task->category_id,
                "name_task"=>$task->name,
                "type"=> 1

            ]);
        }

        }

        //    $user_id_fjs = NULL;
        //    $id_task = $id->id;
        //    $id_cat = $id->category_id;
        //    $title_task = $id->name;
        //    $type = 1;

        //        event(new MyEvent($id_task,$id_cat,$title_task,$type,$user_id_fjs));

        return redirect()->route('searchTask.task', $task->id);
    }

    public function contact_register(Task $task, UserRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make('login123');

        $user = User::create($data);
        LoginController::send_verification('phone', $user);

        return redirect()->route('task.create.verify',  ['task' =>$task->id, 'user' => $user->id]);

    }

    public function contact_login(Task $task, UserPhoneRequest $request)
    {
        $request->validated();
        $user = User::query()->where('phone_number', $request->phone_number)->first();
        LoginController::send_verification('phone', $user);
        return redirect()->route('task.create.verify', ['task' =>$task->id, 'user' => $user->id])->with(['not-show', 'true']);

    }

    public function verify(Task $task,User $user)
    {
        return view('create.verify', compact('task', 'user'));
    }

    public function deletetask(Task $task)
    {
        $task->delete();
        CustomFieldsValue::where('task_id', $task)->delete();
    }

    public function deleteAllImages(Task $task){
        taskGuard($task);
        $task->photos = null;
        $task->save();
        Alert::success('success');
        return back();
    }

}
