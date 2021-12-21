<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\Category;

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
        return view('create.location');

    }

    // public function location_create(){
    //     $task = session('task');
    //     $category = Category::find(session('categroy_id'));
    //
    //     if ($task || $category){
    //         return view('create.location', compact('task', 'category'));
    //     }else{
    //         return back();
    //     }
    //
    // }
    //
    // public function custom(){
    //     return view('create.custom');
    // }

    public function date(Request $request){
      $data = $request->input();
      $request->session()->put('location', $data['location']);
      return view('create.date');
        // return view('create.date');
    }
    public function budget(Request $request){

      $date = $request->input('date');
      $time = $request->input('time');
      $data = $date." ".$time;
      $start = $request->get('start');
      $starrt = implode(" ",$start);
      $request->session()->put('data', $data);
      $request->session()->put('start', $starrt);
      return view('create.budget');
        // return view('create.budget');
    }
    public function notes(Request $request){
      $data = $request->input();
      $request->session()->put('amount', $data['amount']);
      $request->session()->put('business', $data['business']);
      $request->session()->put('insurance', $data['insurance']);
      return view('create.notes');
        // return view('create.notes');
    }
    public function contacts(Request $request){
      $data = $request->input();
      $request->session()->put('description', $data['description']);
      $request->session()->put('secret', $data['secret']);
      $request->session()->put('docs', $data['docs']);
      return view('create.contacts');
    }

    public function create(Request $request){
      $phone       = $request->input('phone');
      $datay        = $request->input();
      $request->session()->put('phone', $datay['phone']);
      $name        = session()->pull('name');
      $category    = session()->pull('cat_id');
      $location    = session()->pull('location');
      $date        = session()->pull('data');
      $start       = session()->pull('start');
      $amount      = session()->pull('amount');
      $description = session()->pull('description');
      $secret      = session()->pull('secret');
      $data=array('name'=>$name,"category_id"=>$category,"address"=>$location,"start_date"=>$date,'date_type'=>$start,'budget'=>$amount,'description'=>$description,'phone'=>$phone,'show_only_to_performers'=>$secret);
      DB::table('tasks')->insert($data);
      return redirect('/')->with('success','Задание успешно добавлено!');
    }




    public function delete(Task $task){
        $task->delete();
        session()->forget('task');
        session()->forget('category');
        return redirect("/home");
    }


}
