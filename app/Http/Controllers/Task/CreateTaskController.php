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

        $name = $request->input('name');
        $category = $request->input('cat_id');
        return view('create.location', compact('name','category'));

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
      $name = $request->input('name');
      $category = $request->input('cat_id');
      $location = $request->input('location');
      return view('create.date', compact('name','category','location'));
        // return view('create.date');
    }
    public function budget(Request $request){
      $name = $request->input('name');
      $category = $request->input('cat_id');
      $location = $request->input('location');
      $date = $request->input('date');
      $time = $request->input('time');
      $data = $date." ".$time;
      // $start = $request->start;
      $start = $request->get('start');
      $starrt = implode(" ",$start);
      // dd($starrt);
      return view('create.budget', compact('name','category','location','data','starrt'));
        // return view('create.budget');
    }
    public function notes(Request $request){
      $name = $request->input('name');
      $category = $request->input('cat_id');
      $location = $request->input('location');
      $date = $request->input('date');
      $time = $request->input('time');
      $data = $request->input('data');
      $start = $request->input('start');
      $amount = $request->input('amount');
      $business = $request->input('business');
      $insurance = $request->input('insurance');
      return view('create.notes', compact('name','category','location','data','start','amount','business','insurance'));
        // return view('create.notes');
    }
    public function contacts(Request $request){
      $name = $request->input('name');
      $category = $request->input('cat_id');
      $location = $request->input('location');
      $data = $request->input('data');
      $start = $request->input('start');
      $amount = $request->input('amount');
      $business = $request->input('business');
      $insurance = $request->input('insurance');
      $description = $request->input('description');
      $secret = $request->input('secret');
      $docs = $request->input('docs');
      return view('create.contacts', compact('name','category','location','data','start','amount','business','insurance','description','secret','docs'));
    }

    public function create(Request $request){
      $name = $request->input('name');
      $category = $request->input('cat_id');
      $location = $request->input('location');
      $data = $request->input('data');
      $start = $request->input('start');
      $amount = $request->input('amount');
      $business = $request->input('business');
      $insurance = $request->input('insurance');
      $description = $request->input('description');
      $secret = $request->input('secret');
      $docs = $request->input('docs');
      $phone = $request->input('phone');
      $data=array('name'=>$name,"category_id"=>$category,"address"=>$location,"start_date"=>$data,'date_type'=>$start,'budget'=>$amount,'description'=>$description,'phone'=>$phone,'show_only_to_performers'=>$secret);
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
