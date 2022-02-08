<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Requests\TaskDateRequest;
use App\Http\Requests\UserPhoneRequest;
use App\Http\Requests\UserRequest;
use App\Models\CustomField;
use App\Models\CustomFieldsValue;
use App\Models\Task;
use App\Models\User;
use App\Models\UserVerify;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use PlayMobile\SMS\SmsService;
use TCG\Voyager\Models\Category;

class CreateController extends Controller
{

    public function name(Request $request)
    {

        $current_category = Category::findOrFail($request->category_id);

        return view("create.name", compact('current_category'));


    }

    public function name_store(Request $request, Task $task)
    {

        $data = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required'
        ]);
        $task = Task::create($data);

        return redirect()->route("task.create.custom.get", $task->id);
    }


    public function custom_get(Task $task)
    {

        $child_cat = $task->category;

        $parent_datas = CustomField::query()->where('category_id', $child_cat->parent_id)->orderBy('order', 'asc')->get();

        $child_datas = CustomField::query()->where('category_id', $task->category_id)->orderBy('order', 'asc')->get();
        $datas = new Collection; //Create empty collection which we know has the merge() method
        $datas = $datas->merge($parent_datas);
        $datas = $datas->merge($child_datas);

        if (!$datas->count()) {
            return redirect()->route('task.create.address', $task->id);
        }

        return view('create.custom', compact('datas', 'task'));

    }

    public function custom_store(Request $request, Task $task)
    {

        $child_cat = $task->category;

        $parent_datas = CustomField::query()->where('category_id', $child_cat->parent_id)->orderBy('order', 'asc')->get();

        $child_datas = CustomField::query()->where('category_id', $task->category_id)->orderBy('order', 'asc')->get();
        $datas = new Collection; //Create empty collection which we know has the merge() method
        $datas = $datas->merge($parent_datas);
        $datas = $datas->merge($child_datas);

        if (!$datas) {
        }

        foreach ($datas as $data) {
            $value = new CustomFieldsValue();
            $value->task_id = $task->id;
            $value->custom_field_id = $data->id;
            $arr = Arr::get($request->all(), $data->name);
            $value->value = is_array($arr) ? json_encode($arr) : $arr;
            $value->save();
        }


        return redirect()->route('task.create.address', $task->id);
    }


    public function address(Task $task)
    {
        return view('create.location', compact('task'));

    }

    public function address_store(Request $request, Task $task)
    {

        $data = [];
        $data_inner = [];
        for ($i = 0; $i < 5; $i++) {
            $location = Arr::get($request->all(), 'location' . $i);
            $coordinates = Arr::get($request->all(), 'coordinates' . $i);
            if ($coordinates) {
                $data_inner['location'] = $location;
                $data_inner['longitude'] = explode(',', $coordinates)[1];
                $data_inner['latitude'] = explode(',', $coordinates)[0];
                if ($i != 0) {
                    $data[] = $data_inner;
                } else {
                    $task->address = json_encode($data_inner);
                }
            }
        }
        $task->coordinates = $request->coordinates0;
        $task->address_add = json_encode($data);
        $task->save();

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

        return redirect()->route('task.create.note', $task->id);

    }

    public function note(Task $task)
    {
        return view('create.notes', compact('task'));
    }

    public function uploadImage(Request $request)
    {
        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')
                ->storeAs('uploads/upload', $fileName, 'public');

            $fileModelname = time() . '_' . $request->file->getClientOriginalName();
            $fileModelfile_path = '/storage/' . $filePath;
            $request->session()->put('photo', $fileName);
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
            'oplata' => 'required'
        ]);

        $data['photos'] = session()->pull('photo');
        $data['docs'] = $request->docs ? 1 : null;
        $task->update($data);
        return redirect()->route("task.create.contact", $task->id);
    }


    public function contact(Task $task)
    {
        return view('create.contacts', compact('task'));
    }


    public function contact_store(Task $task, UserPhoneRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();
        if (!$user->is_phone_number_verified || $user->phone_number != $data['phone_number']) {
            $data['is_phone_number_verified'] = 0;
            $user->update($data);

            LoginController::send_verification('phone');
            return redirect()->route('task.create.verify', $task->id);
        }

        $task->status = 1;
        $task->user_id = $user->id;
        $task->phone = $user->phone_number;
        $task->save();
        return redirect()->route('userprofile');
    }

    public function contact_register(Task $task, UserRequest $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt('login123');

        $user = User::create($data);

        auth()->login($user);


        LoginController::send_verification('phone');
        return redirect()->route('task.create.verify', $task->id);

    }

    public function contact_login(Task $task, UserPhoneRequest $request )
    {
        $request->validated();
        $user = User::query()->where('phone_number', $request->phone_number)->first();
        auth()->login($user);
        LoginController::send_verification('phone');
        return redirect()->route('task.create.verify', $task->id)->with(['not-show', 'true']);

    }

    public function verify(Task $task)
    {
        return view('create.verify', compact('task'));
    }

    public function deletetask(Task $task)
    {
        $task->delete();
        CustomFieldsValue::where('task_id', $task)->delete();
    }


}
