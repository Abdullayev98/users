<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Events\MyEvent;


class CreateTaskController extends VoyagerBaseController
{
    //

    public function task_create(Request $request){

        $current_category = Category::find($request->category_id);
        if (!$current_category){
            return back();
        }
        $categories = Category::query()->where("parent_id", null)->get();
        $current_parent_category = Category::find($current_category->parent_id);
        $child_categories = Category::query()->where("parent_id", $current_parent_category->id)->get();
        return view("create.name", compact('categories', 'current_category','child_categories', 'current_parent_category'));
    }

    public function task_add(Request $request){

        $data = $request->input();
        $request->session()->put('name', $data['name']);
        $request->session()->put('cat_id', $data['cat_id']);
        $request->session()->flash('neym', $data['name']);
        if (Auth::user()) {
          $user_name = Auth::user()->name;
          $email = Auth::user()->email;
          $request->session()->put('user_name',$user_name);
          $request->session()->put('email',$email);
        }
        $category_id = session()->pull('cat_id');
        $request->session()->put('cat_id', $category_id);
        $child_category = Category::where('id', $category_id)->first();
        $cat = $child_category->parent_id;
        $pcategory = Category::where('id', $cat)->first();
        return view('create.location', compact('pcategory'));

    }

    public function location(Request $request){

        return view('create.location');
    }
    public function cargo(Request $request)
    {
      if ($request->input('location')) {
        $location = $request->input('location');
        $location2 = $request->input('location1');
        if ($location2 != '') {
          $fullloc = $location." | ".$location2;
        }else {
          $fullloc = $location;
        }
          $request->session()->put('location', $fullloc);
          $request->session()->flash('location2', $request->input('location'));
      }
//        $data = $request->input();
//        $request->session()->put('name', $data['name']);

        return view('create.cargo');
    }
    public function people(Request $request)
    {
      $weight = $request->input('weight');
      $length = $request->input('length');
      $width = $request->input('width');
      $height = $request->input('height');
      $request->session()->put('weight', $weight);
      $request->session()->put('length', $length);
      $request->session()->put('width', $width);
      $request->session()->put('height', $height);
      if(session('cat_id') == 50){
          $request->session()->forget('weight');
      }
        return view('create.people');
    }

    public function movers(Request $request)
    {
      if($_POST['contact'] == 'da'){
        $need_movers = 1;
        $request->session()->put('movers', $need_movers);
        return view('create.movers');
    }else {
      return view('create.date');
    }
    }
    public function peopleTransported(Request $request)
    {
        return view('create.peopleTransported');
    }
    public function date(Request $request){
        if ($request->input('location')) {
          $location = $request->input('location');
          $location2 = $request->input('location1');
          if ($location2 != '') {
            $fullloc = $location." | ".$location2;
          }else {
            $fullloc = $location;
          }
            $request->session()->put('location', $fullloc);
            $request->session()->flash('location2', $request->input('location'));
        }else {
          $etaj_po = $request->input('etaj_po');
          $lift_po = $request->input('lift_po');
          $etaj_za = $request->input('etaj_za');
          $lift_za = $request->input('lift_za');
          $people_count = $request->input('peopleCount');
          $request->session()->put('peopleCount', $people_count);
          $request->session()->put('etaj_po', $etaj_po);
          $request->session()->put('lift_po', $lift_po);
          $request->session()->put('etaj_za', $etaj_za);
          $request->session()->put('lift_za', $lift_za);
        }

        return view('create.date');
    }
    public function budget(Request $request){
      $date = $request->input('date');
      $time = $request->input('time');
      $request->session()->flash('deyt', $request->input('date'));
      $request->session()->flash('taym', $request->input('time'));
      $data = $date." ".$time;
      $date2 = $request->input('date2');
      $time2 = $request->input('time2');
      $request->session()->flash('deyt2', $request->input('date2'));
      $request->session()->flash('taym2', $request->input('time2'));
      $data2 = $date2." ".$time2;
      $start = $request->get('start');
      if ($start) {
        $starrt = implode(" ",$start);
        $request->session()->put('data', $data);
        $request->session()->put('data2', $data);
        $request->session()->put('start', $starrt);
      }
      $cat_id = session()->pull('cat_id');
      $request->session()->put('cat_id', $cat_id);
      $category = Category::where('id',$cat_id)->first();
      return view('create.budget',compact('category'));
        // return view('create.budget');
    }

    public function service(Request $request){
      $cat_id = $request->session()->pull('cat_id');
      $category = Category::where('id',$cat_id)->first();
      $categories = explode(',',$category->services);
      return view('create.services', compact('categories'));
    }


    public function services(Request $request){
      $data = $request->input();
      $request->session()->put('amount', $data['amount']);
      $request->session()->flash('soqqa', $request->input('amount'));
      if ($request->input('business')) {
        $request->session()->put('business', $data['business']);
      }else {
        $request->session()->put('business', 0);
      }
      if ($request->input('insurance')) {
        $request->session()->put('insurance', $data['insurance']);
      }else {
        $request->session()->put('insurance', 0);
      }

      $cat_id = session()->pull('cat_id');
      $request->session()->put('cat_id', $cat_id);
      $category = Category::where('id',1)->first();
      $categories = explode(',',$category->services);
      return view('create.services', compact('categories'));
    }

    public function note(Request $request){
      $descriptioon = $request->session()->pull('description');
      return view('create.notes', compact('descriptioon'));
    }


    public function notes(Request $request){
      $data = $request->input();
      $serv = implode(",", $data['services']);
      $request->session()->put('services', $serv);
      return view('create.notes');
        // return view('create.notes');
    }


    public function contacts(Request $request){
      $data = $request->input();
      $request->session()->put('description', $data['description']);
      if ($request->input('secret')) {
        $request->session()->put('secret', $data['secret']);
      }else {
        $request->session()->put('secret', 0);
      }
      if ($request->input('docs')) {
        $request->session()->put('docs', $data['docs']);
      }else {
        $request->session()->put('docs', 0);
      }
      return view('create.contacts');
    }

    public function create(Request $request){
      $phone      = $request->input('phone');
      $datay      = $request->input();
      $request->session()->put('phone', $datay['phone']);
      $name        = session()->pull('name');
      $category    = session()->pull('cat_id');
      $location    = session()->pull('location');
      $date        = session()->pull('data');
      $date2       = session()->pull('data2');
      $start       = session()->pull('start');
      $amount      = session()->pull('amount');
      $description = session()->pull('description');
      $need_movers = session()->pull('movers');
      $secret      = session()->pull('secret');
      $services      = session()->pull('services');
      $etaj_po = session()->pull('etaj_po');
      $lift_po = session()->pull('lift_po');
      $etaj_za = session()->pull('etaj_za');
      $lift_za = session()->pull('lift_za');
      $peopleCount = session()->pull('peopleCount');
      $weight = session()->pull('weight');
      $length = session()->pull('length');
      $width = session()->pull('width');
      $height = session()->pull('height');
      $user_id     =     Auth::id();
      if (!Auth::user()) {
        $user_name  = $request->input('user_name');
        $email      = $request->input('email');
        $request->session()->put('user_name', $user_name);
        $request->session()->put('email', $email);
        $user_name  = session()->pull('user_name');
        $email      = session()->pull('email');
      }else {
        $user_name  = session()->pull('user_name');
        $email      = session()->pull('email');
      }

      $id = Task::create([

        'user_id'=>$user_id,
        'name'=>$name,
        "category_id"=>$category,
        "address"=>$location,
        "start_date"=>$date,
        'date_type'=>$start,
        'budget'=>$amount,
        'description'=>$description,
        'phone'=>$phone,
        'show_only_to_performers'=>$secret

    ]);

    Notification::create([

        'user_id'=>$user_id,
        'description'=> 1,
        'task_id'=>$id->id,
        "cat_id"=>$category

    ]);

   $id_task = $id->id;
   $id_cat = $id->category_id;
   $title_task = $id->name;

       event(new MyEvent($id_task,$id_cat,$title_task));

     return redirect('/')->with('success','Задание успешно добавлено!');
    }




    public function delete(Task $task){
        $task->delete();
        session()->forget('task');
        session()->forget('category');
        return redirect("/home");
    }


}
