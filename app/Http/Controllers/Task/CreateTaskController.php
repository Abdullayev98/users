<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\MyEvent;


class CreateTaskController extends VoyagerBaseController
{
    //

    public function task_create(Request $request){

        $current_category = Category::findOrFail($request->category_id);
        $categories = Category::query()->where("parent_id", null)->get();
        $current_parent_category = Category::find($current_category->parent_id);
        $child_categories = Category::query()->where("parent_id", $current_parent_category->id)->get();
        $request->session()->put('current_parent_category', $current_parent_category);
        $category_id = $request->category_id;
        $request->session()->put('cat_id', $category_id);
        return view("create.name", compact('category_id' ,'categories', 'current_category','child_categories', 'current_parent_category'));
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
        $request->session()->put('parent_id', $pcategory);
        return view('create.location', compact('pcategory'));

    }
    public function car_service(Request $request)
    {
      $popeg = $request->input('popeg');
      $no_texpassport = $request->input('no_texpassport');
      $request->session()->put('popeg', $popeg);
      $request->session()->put('no_texpassport', $no_texpassport);
      $category = Category::where('id', 213)->first();
      $categories = explode(',',$category->services);
      return view('create.car_service', compact('categories'));
    }
    public function remont_car(Request $request)
    {
        $data = $request->input();
        $request->session()->put('cat_id', $data['cat_id']);
        $cat_id = session()->pull('cat_id');
        $request->session()->put('cat_id', $cat_id);
      return view('create.remont_car');
    }
    public function info_car(Request $request)
    {
      $data = $request->input('car');
      $request->session()->put('car', $data);
      return view('create.info_car');
    }
    public function construction(Request $request)
    {
      $cat_id = session()->pull('cat_id');
      $request->session()->put('cat_id', $cat_id);
      $category = Category::where('id', 30)->first();
      $category1 = Category::where('id', 31)->first();
      $categories = explode(',',$category->services);
      $categories1 = explode(',',$category1->services);
      $category2 = Category::where('id', 2)->first();
      $categories2 = explode(',',$category2->services);
      return view('create.construction', compact('categories','categories1','categories2', 'cat_id'));
    }
    public function avto_delivery(Request $request)
    {
      return view('create.delivery_avto');
    }
    public function service_delivery(Request $request)
    {
        $cat_id = session()->pull('cat_id');
        $request->session()->put('cat_id', $cat_id);
        $category = Category::where('id', 1)->first();
        $categories = explode(',',$category->services);
      return view('create.delivery1', compact('categories'));
    }
    public function delivery(Request $request)
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
          $coordinates = $request->input('coordinates');
          $request->session()->put('coordinates', $coordinates);
          $request->session()->flash('location2', $request->input('location'));

      }
      return view('create.delivery');
    }
    public function buy_delivery(Request $request)
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
          $coordinates = $request->input('coordinates');
          $request->session()->put('coordinates', $coordinates);
          $request->session()->flash('location2', $request->input('location'));

      }
      return view('create.buy_delivery');
    }
    public function age(Request $request)
    {
      $data = $request->input();
        $request->session()->put('cat_id', $data['cat_id']);
        $cat_id = session()->pull('cat_id');
        $request->session()->put('cat_id', $cat_id);
        $category = Category::where('id', 19)->first();
        $categories = explode(',',$category->services);
      return view('create.age');
    }
    public function training(Request $request)
    {
      $data = $request->input('age');
      $request->session()->put('age', $data);
      return view('create.training');
    }
    public function learning(Request $request)
    {
      $training = $request->input('training');
      $time = $request->input('time',$training);
      $request->session()->put('time', $time);
        $cat_id = session()->pull('cat_id');
        $request->session()->put('cat_id', $cat_id);
        $category = Category::where('id', 19)->first();
        $categories = explode(',',$category->services);
      return view('create.learning', compact('categories'));
    }
    public function bugalter(Request $request)
    {
        $data = $request->input();
        $request->session()->put('cat_id', $data['cat_id']);
        $cat_id = session()->pull('cat_id');
        $request->session()->put('cat_id', $cat_id);
        $category = Category::where('id', 18)->first();
        $categories = explode(',',$category->services);
      return view('create.bugalter', compact('categories'));
    }
    public function remont_tex(Request $request)
    {
      $data = $request->input();
        $request->session()->put('cat_id', $data['cat_id']);
        $cat_id = session()->pull('cat_id');
        $request->session()->put('cat_id', $cat_id);
        $category = Category::where('id', 17)->first();
        $categories = explode(',',$category->services);
      return view('create.remont_tex', compact('categories'));
    }
    public function krosata(Request $request)
    {
      $data = $request->input();
        $request->session()->put('cat_id', $data['cat_id']);
        $cat_id = session()->pull('cat_id');
        $request->session()->put('cat_id', $cat_id);
        $category = Category::where('id', 16)->first();
        $categories = explode(',',$category->services);
      return view('create.krosata', compact('categories'));
    }
    public function remont_ustanovka(Request $request)
    {
      $data = $request->input();
        $request->session()->put('cat_id', $data['cat_id']);
        $cat_id = session()->pull('cat_id');
        $request->session()->put('cat_id', $cat_id);
        $category = Category::where('id', 15)->first();
        $categories = explode(',',$category->services);
        return view('create.remont_ustanovka', compact('categories'));
    }
    public function photo(Request $request)
    {
      $data = $request->input();
        $request->session()->put('cat_id', $data['cat_id']);
        $cat_id = session()->pull('cat_id');
        $request->session()->put('cat_id', $cat_id);
        $category = Category::where('id', 13)->first();
        $categories = explode(',',$category->services);
      return view('create.photo', compact('categories'));
    }
    public function it(Request $request)
    {
      $data = $request->input();
        $request->session()->put('cat_id', $data['cat_id']);
        $cat_id = session()->pull('cat_id');
        $request->session()->put('cat_id', $cat_id);
        $category = Category::where('id', 12)->first();
        $categories = explode(',',$category->services);
        return view('create.it', compact('categories'));
    }
    public function design(Request $request)
    {
      $data = $request->input();
        $request->session()->put('cat_id', $data['cat_id']);
        $cat_id = session()->pull('cat_id');
        $request->session()->put('cat_id', $cat_id);
        $category = Category::where('id', 11)->first();
        $categories = explode(',',$category->services);
      return view('create.design', compact('categories'));
    }
    public function computer(Request $request)
    {
      $data = $request->input();
        $request->session()->put('cat_id', $data['cat_id']);
        $cat_id = session()->pull('cat_id');
        $request->session()->put('cat_id', $cat_id);
        $category = Category::where('id', 9)->first();
        $categories = explode(',',$category->services);
      return view('create.computer', compact('categories'));
    }
    public function smm(Request $request)
    {
      $data = $request->input();
      $request->session()->put('cat_id', $data['cat_id']);
      $cat_id = session()->pull('cat_id');
      $request->session()->put('cat_id', $cat_id);
      $category = Category::where('id', 8)->first();
      $categories = explode(',',$category->services);
        return view('create.smm', compact('categories'));
    }
    public function housemaid(Request $request)
    {
        return view('create.housemaid');
    }
    public function housemaid1(Request $request)
    {
        $where = $request->input('where');
        $how_many = $request->input('how_many');
        $request->session()->put('where', $where);
        $request->session()->put('how_many', $how_many);
        $cat_id = session()->pull('cat_id');
        $request->session()->put('cat_id', $cat_id);
        $category = Category::where('id',7)->first();
        $categories = explode(',',$category->services);
        return view('create.housemaid1', compact('categories'));
    }
    public function glass(Request $request)
    {

        return view('create.glass');
    }
    public function location(Request $request)
    {
        if($service1 = $request->input('services')){
          $services = implode(',',$service1);
          if ($service1[0] == '???????????? ????????'){
              return view('create.glass');
          }
          $request->session()->put('service1', $services);
        }elseif($glassSht = $request->input('box')){
            $request->session()->put('box', $glassSht);
        }elseif($data = $request->input('smm')){
          $request->session()->put('smm', $data);
          if($data == '?????????? ?????????????????? ????????????????'){
            return view('create.date');
          }
          $request->session()->put('smm', $data);
        }elseif($data = $request->input('computer')){
          $request->session()->put('computer_service', $data);
          if($data == '?????????? ?????????????????? ????????????????'){
              return view('create.date');
          }
          $request->session()->put('computer_service', $data);
        }elseif($data = $request->input('design')){
          $request->session()->put('design_service', $data);
          if($data == '?????????? ?????????????????? ????????????????'){
            return view('create.date');
          }
          $request->session()->put('design_service', $data);
        }elseif($data = $request->input('it')){
          $request->session()->put('it_service', $data);
          if($data == '?????????? ?????????????????? ????????????????'){
            return view('create.date');
          }
          $request->session()->put('it_service', $data);
        }elseif($data = $request->input('photo')){
          $request->session()->put('photo_service', $data);
          if($data == '?????????? ?????????????????? ????????????????'){
            return view('create.date');
        }
        $request->session()->put('photo_service', $data);
        }elseif($data = $request->input('remont_ustanovka')){
          $request->session()->put('remont_ustanovka_service', $data);
        }elseif($data = $request->input('krosata')){
          $request->session()->put('krosata_service', $data);
        }elseif($data = $request->input('remont_tex')){
          $request->session()->put('remont_tex_service', $data);
        }elseif($data = $request->input('bugalter')){
          $request->session()->put('bugalter_service', $data);
          if($data == '?????????? ?????????????????? ????????????????'){
            return view('create.date');
          }
          $request->session()->put('bugalter_service', $data);
        }elseif($data = $request->input('learning')){
          $request->session()->put('learning_service', $data);
          if($data == '???????????????? (?????????? ????????????????)'){
            return view('create.date');
          }
          $request->session()->put('learning_service', $data);
        }
        $car_service = $request->input('car_service');
        $request->session()->put('car_service', $car_service);
        $computer = session()->pull('computer_service');
        $request->session()->put('computer_service', $computer);
        $smm = session()->pull('smm');
        $request->session()->put('smm', $smm);
        $service = $request->session()->pull('service1');
        $request->session()->put('service1', $service);
        $glass = $request->session()->pull('box');
        $request->session()->put('box', $glass);
        $category_id = session()->pull('cat_id');
        $request->session()->put('cat_id', $category_id);
        $child_category = Category::where('id', $category_id)->first();
        $cat = $child_category->parent_id;
        $pcategory = Category::where('id', $cat)->first();
        $request->session()->put('parent_id', $pcategory);
        return view('create.location', compact('pcategory'));
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
        $peopleCount = $request->input('peopleCount');
        $request->session()->put('peopleCount', $peopleCount);
        if ($request->input('location')) {
          $location = $request->input('location');
          $location2 = $request->input('location1');
          if ($location2 != '') {
            $fullloc = $location." | ".$location2;
          }else {
            $fullloc = $location;
          }
            $request->session()->put('location', $fullloc);
            $coordinates = $request->input('coordinates');
            $request->session()->put('coordinates', $coordinates);
            $request->session()->flash('location2', $request->input('location'));

        }
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
            $coordinates = $request->input('coordinates');
            $request->session()->put('coordinates', $coordinates);
            $request->session()->flash('location2', $request->input('location'));

        }
        if($data2 = $request->input('delivey_weight')){
          $delivey_weight = $request->input('delivey_weight');
          $delivey_height = $request->input('delivey_height');
          $delivey_width = $request->input('delivey_width');
          $delivey_length = $request->input('delivey_length');
          $delivey_budget = $request->input('delivey_budget');
          $request->session()->put('delivey_weight', $delivey_weight);
          $request->session()->put('delivey_height', $delivey_height);
          $request->session()->put('delivey_width', $delivey_width);
          $request->session()->put('delivey_length', $delivey_length);
          $request->session()->put('delivey_budget', $delivey_budget);
        }elseif($data1 = $request->input('buy_delivey_weight')){
          $buy_delivey_weight = $request->input('buy_delivey_weight');
          $buy_delivey_height = $request->input('buy_delivey_height');
          $buy_delivey_width = $request->input('buy_delivey_width');
          $buy_delivey_length = $request->input('buy_delivey_length');
          $request->session()->put('buy_delivey_weight', $buy_delivey_weight);
          $request->session()->put('buy_delivey_height', $buy_delivey_height);
          $request->session()->put('buy_delivey_width', $buy_delivey_width);
          $request->session()->put('buy_delivey_length', $buy_delivey_length);
        }elseif($data = $request->input('delivey_car')){
        $request->session()->put('delivey_car', $data);
        }else {
            if(session('cat_id') != 52){
                $etaj_po = $request->input('etaj_po');
                $lift_po = $request->input('lift_po');
                $etaj_za = $request->input('etaj_za');
                $lift_za = $request->input('lift_za');
                $request->session()->put('etaj_po', $etaj_po);
                $request->session()->put('lift_po', $lift_po);
                $request->session()->put('etaj_za', $etaj_za);
                $request->session()->put('lift_za', $lift_za);
            }else{
                $etaj_po = $request->input('etaj_po');
                $lift_po = $request->input('lift_po');
                $request->session()->put('etaj_po', $etaj_po);
                $request->session()->put('lift_po', $lift_po);
            }

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
      $parent_id = session()->pull('parent_id');
      $request->session()->put('parent_id', $parent_id);
      $category = Category::where('id',$cat_id)->first();
      $parent_8 = Category::query()->where("parent_id", null)->skip(4)->first();
      $request->session()->put('parent_8', $parent_8);
      return view('create.budget',compact('category','parent_id'));
        // return view('create.budget');
    }

    public function service(Request $request){
      $cat_id = $request->session()->pull('cat_id');
      $category = new Category;
      $categories = explode(',',$category['services']);
      return view('create.services', compact('categories'));
    }



    public function note(Request $request){
      $descriptioon = $request->session()->pull('description');
      $request->session()->put('description', $descriptioon);
      return view('create.notes', compact('descriptioon'));
    }


    public function notes(Request $request){
      if($data = $request->input('service_delivery')){
          $request->session()->put('service_delivery', $data);
      }elseif($construction = $request->input('construction')){
        $services = implode(',', $construction);
        $request->session()->put('construction_service', $services);
      }
      if($request->input('amount') != 0){
        $budget = $request->input('amount');
        $request->session()->put('amount', $budget);
      }else{
        $budget = $request->input('amount1');
        $request->session()->put('amount1', $budget);
      }
        $cat_id = session()->pull('cat_id');
        $request->session()->put('cat_id', $cat_id);
        $category = Category::where('id',$cat_id)->first();
        if($category->id == 60){
            $data = null;
            $serv = null;
            $request->session()->put('services', $serv);
        }elseif(session('parent_8')){
          $data = null;
          $serv = null;
          // $request->session()->put('services', $serv);
        }else{
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
        }

        return view('create.notes');
    }


    public function contacts(Request $request){

      if($request->avatar) {
      $image = $request->avatar;
      $imagename = $image->getClientOriginalName();
      $request->avatar->move('storage/tasks/avatar', $imagename);
      $request->session()->put('image', 'storage/tasks/avatar/'.''.$imagename);
    }
      $data = $request->input();
      $request->session()->put('oplata', $data['oplata']);
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



}
