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

        $current_category = Category::find($request->category_id);
        if (!$current_category){
            return back();
        }
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
          if ($service1[0] == 'Помыть окна'){
              return view('create.glass');
          }
          $request->session()->put('service1', $services);
        }elseif($glassSht = $request->input('box')){
            $request->session()->put('box', $glassSht);
        }elseif($data = $request->input('smm')){
          $request->session()->put('smm', $data);
          if($data == 'Можно выполнить удаленно'){
            return view('create.date');
          }
          $request->session()->put('smm', $data);
        }elseif($data = $request->input('computer')){
          $request->session()->put('computer_service', $data);
          if($data == 'Можно выполнить удаленно'){
              return view('create.date');
          }
          $request->session()->put('computer_service', $data);
        }elseif($data = $request->input('design')){
          $request->session()->put('design_service', $data);
          if($data == 'Можно выполнить удаленно'){
            return view('create.date');
          }
          $request->session()->put('design_service', $data);
        }elseif($data = $request->input('it')){
          $request->session()->put('it_service', $data);
          if($data == 'Можно выполнить удаленно'){
            return view('create.date');
          }
          $request->session()->put('it_service', $data);
        }elseif($data = $request->input('photo')){
          $request->session()->put('photo_service', $data);
          if($data == 'Можно выполнить удаленно'){
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
          if($data == 'Можно выполнить удаленно'){
            return view('create.date');
          }
          $request->session()->put('bugalter_service', $data);
        }elseif($data = $request->input('learning')){
          $request->session()->put('learning_service', $data);
          if($data == 'Удаленно (через интернет)'){
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
      }else{
        $budget = $request->input('amount1');
      }
      
      $request->session()->put('amount', $budget);
      dd($budget);
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

    public function create(Request $request){
      $cat_id = session()->pull('cat_id');
      $request->session()->put('cat_id', $cat_id);
      if(session('parent_id')->id == 213){
      $car_model = session()->pull('car');
      $popeg = session()->pull('popeg');
      $no_texpassport = session()->pull('no_texpassport');
      $car_service = session()->pull('car_service');
      }
      $car_model = null;
      $popeg = null;
      $no_texpassport = null;
      $car_service = null;
      $phone      = $request->input('phone');
      $datay      = $request->input();
      // if(session('cat_id') == ){
        if($cat_id == 24){
          $service_delivery = session()->pull('service_delivery');
          $buy_delivey_weight = session()->pull('buy_delivey_weight');
      $buy_delivey_height = session()->pull('buy_delivey_height');
      $buy_delivey_width = session()->pull('buy_delivey_width');
      $buy_delivey_length = session()->pull('buy_delivey_length');
        }elseif($cat_id == 27){
          $service_delivery = session()->pull('service_delivery');
          $buy_delivey_weight = session()->pull('buy_delivey_weight');
      $buy_delivey_height = session()->pull('buy_delivey_height');
      $buy_delivey_width = session()->pull('buy_delivey_width');
      $buy_delivey_length = session()->pull('buy_delivey_length');
        }
          else{
            $service_delivery = null;
          $buy_delivey_weight = null;
          $buy_delivey_height = null;
          $buy_delivey_width = null;
          $buy_delivey_length = null;
        }


      // }
//      $request->session()->put('phone', $datay['phone']);
      $oplata = session()->pull('oplata');
      $name        = session()->pull('name');
      $category    = session()->pull('cat_id');
      $image    = session()->pull('image');
      $location    = session()->pull('location');
      $date        = session()->pull('data');
      $date2       = session()->pull('data2');
      $start       = session()->pull('start');
      $amount      = session()->pull('amount');
      $description = session()->pull('description');
      $need_movers = session()->pull('need_movers');
      $secret      = session()->pull('secret');
      $services      = session()->pull('services');
      $etaj_po = session()->pull('etaj_po');
      $lift_po = session()->pull('lift_po');
      $etaj_za = session()->pull('etaj_za');
      $lift_za = session()->pull('lift_za');
      $coordinates = session()->pull('coordinates');
      $peopleCount = session()->pull('peopleCount');
      if(session('parent_id')->id == 13){
        $photo = session()->pull('photo_service');
      }else{
        $photo = null;
      }
        if ($category == 50) {
            $weight = session()->pull('weight');
            $length = session()->pull('length');
            $width = session()->pull('width');
            $height = session()->pull('height');
        }else {
            $weight = null;
            $length = null;
            $width = null;
            $height = null;
        }
      $smm = session()->pull('smm');

      if(session('parent_id')->id == 9){
        $computer = session()->pull('computer_service');
      }else{
        $computer = null;
      }

      if(session('parent_id')->id == 11){
        $design = session()->pull('design_service');
      }else{
        $design = null;
      }

      if(session('parent_id')->id == 12){
        $it = session()->pull('it_service');
      }else{
        $it = null;
      }
      if($category == 60){
        $glassSht = session()->pull('box');
        $service1 = session()->pull('service1');
        $where = session()->pull('where');
        $how_many = session()->pull('how_many');
      }else{
        $glassSht = null;
        $service1 = null;
        $where = null;
        $how_many = null;
      }
      if(session('parent_id')->id == 15){
        $remont_ustanovka = session()->pull('remont_ustanovka_service');
      }else{
        $remont_ustanovka = null;
      }
      if(session('parent_id')->id == 16){
        $krosata_service = session()->pull('krosata_service');
      }else{
        $krosata_service = null;
      }
      if(session('parent_id')->id == 17){
        $remont_tex = session()->pull('remont_tex_service');
      }else{
        $remont_tex = null;
      }
      if(session('parent_id')->id == 18){
        $bugalter_service = session()->pull('bugalter_service');
      }else{
        $bugalter_service = null;
      }
      if(session('parent_id')->id == 19){
        $training = session()->pull('training');
        $age = session()->pull('age');
        $time = session()->pull('time');
        $learning_service = session()->pull('learning_service');
      }else{
        $training = null;
        $age = null;
        $time = null;
        $learning_service = null;
      }
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
      $delivey_car = null;
      if($cat_id == 22){
        $delivey_weight = session()->pull('delivey_weight');
      $delivey_height = session()->pull('delivey_height');
      $delivey_width = session()->pull('delivey_width');
      $delivey_length = session()->pull('delivey_length');
      $delivey_budget = session()->pull('delivey_budget');
      }elseif($cat_id == 23){
        $delivey_weight = session()->pull('delivey_weight');
      $delivey_height = session()->pull('delivey_height');
      $delivey_width = session()->pull('delivey_width');
      $delivey_length = session()->pull('delivey_length');
      $delivey_budget = session()->pull('delivey_budget');
      }elseif($cat_id == 25){
        $delivey_weight = session()->pull('delivey_weight');
      $delivey_height = session()->pull('delivey_height');
      $delivey_width = session()->pull('delivey_width');
      $delivey_length = session()->pull('delivey_length');
      $delivey_budget = session()->pull('delivey_budget');
      }elseif($cat_id == 28){
        $delivey_weight = session()->pull('delivey_weight');
      $delivey_height = session()->pull('delivey_height');
      $delivey_width = session()->pull('delivey_width');
      $delivey_length = session()->pull('delivey_length');
      $delivey_budget = session()->pull('delivey_budget');
      $delivey_car = session()->pull('delivey_car');
      }elseif($cat_id == 29){
        $delivey_weight = session()->pull('delivey_weight');
      $delivey_height = session()->pull('delivey_height');
      $delivey_width = session()->pull('delivey_width');
      $delivey_length = session()->pull('delivey_length');
      $delivey_budget = session()->pull('delivey_budget');
      }else{
        $delivey_weight = null;
      $delivey_height = null;
      $delivey_width = null;
      $delivey_length = null;
      $delivey_budget = null;
      }
      if(session('parent_id')->id == 2){
        $construction_service = session()->pull('construction_service');
      }else{
        $construction_service = null;
      }
      if($location == null){
          $location = 'Можно выполнить удаленно';
      }
      $id = Task::create([
        'photos' => $image,
        'user_id'=>$user_id,
        'name'=>$name,
        'user_email'=>$email,
        'user_name'=>$user_name,
        "category_id"=>$category,
        "address"=>$location,
        "start_date"=>$date,
        'date_type'=>$start,
        'budget'=>$amount,
        'description'=>$description,
        'phone'=>$phone,
        'need_movers'=>$need_movers,
        'show_only_to_performers'=>$secret,
        'car_model' => $car_model,
        'car_service' => $car_service,
        'pobeg' => $popeg,
        'no_texpassport' => $no_texpassport,
        'delivery_weight' => $delivey_weight,
        'delivery_height' => $delivey_height,
        'delivery_width' => $delivey_width,
        'delivery_length' => $delivey_length,
        'delivery_budget' => $delivey_budget,
        'delivery_car' => $delivey_car,
        'service_delivery' => $service_delivery,
        'buy_delivery_weight' => $buy_delivey_weight,
        'buy_delivery_height' => $buy_delivey_height,
        'buy_delivery_width' => $buy_delivey_width,
        'buy_delivery_length' => $buy_delivey_length,
        'construction_service' => $construction_service,
        'services' => $services,
        'etaj_po' => $etaj_po,
        'lift_po' => $lift_po,
        'etaj_za' => $etaj_za,
        'lift_za' => $lift_za,
        'peopleCount' => $peopleCount,
        'weight' => $weight,
        'length' => $length,
        'width' => $width,
        'height' => $height,
        'glassSht' => $glassSht,
        'service1' => $service1,
        'where' => $where,
        'how_many' => $how_many,
        'smm_service' => $smm,
        'computer_service' => $computer,
        'design_service' => $design,
        'it_service' => $it,
        'photo_service' => $photo,
        'remont_ustanovka_service' => $remont_ustanovka,
        'remont_tex' => $remont_tex,
        'krosata_service' => $krosata_service,
        'bugalter_service' => $bugalter_service,
        'coordinates' => $coordinates,
        'learning_service' => $learning_service ,
        'age' => $age,
        'time' => $time,
        'training' => $training,
        'oplata' => $oplata,
       ]);
        session()->forget('task');
        session()->forget('category');

        foreach(User::all() as $users){


            $user_cat_ids = explode(",",$users->category_id);
            $check_for_true = array_search($category,$user_cat_ids);

            if($check_for_true !== false){
            Notification::create([

                'user_id'=>$users->id,
                'description'=> 1,
                'task_id'=>$id->id,
                "cat_id"=>$category,
                "name_task"=>$id->name,
                "type"=> 1

            ]);
        }

        }

           $user_id_fjs = NULL;
           $id_task = $id->id;
           $id_cat = $id->category_id;
           $title_task = $id->name;
           $type = 1;

               event(new MyEvent($id_task,$id_cat,$title_task,$type,$user_id_fjs));

         return redirect('/')->with('success','Задание успешно добавлено!');

    }


}
