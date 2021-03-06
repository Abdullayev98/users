<?php

use App\Models\Category;
use App\Models\FaqCategories;
use App\Models\UserView;
use App\Services\Task\CreateService;

if (!function_exists('amount_format')) {
    function amount_format($amount)
    {
        return number_format((int)$amount, 0, ",", ".").' UZS';
    }
}

function getMyText(){
    return 'Hello World';
}
function getAddress($data){
    $array = (new CreateService())->addAdditionalAddress(request());
    $data['address'] = $array['address'];
    $data['address_add'] = $array['address_add'];
    $data['coordinates'] = $data['coordinates0'];
    unset($data['coordinates0']);
    unset($data['location0']);
    return $data;
}

function portfolioGuard($portfolio){
    if ($portfolio->user_id != auth()->user()->id){
        abort(403);
    }
}
function getAdditionalAddress($data){
    $address = [];
    $address['location'] = $data['address'];
    $address['latitude'] = explode(',',$data['coordinates'])[0];
    $address['longitude'] = explode(',',$data['coordinates'])[1];

    return $data;
}

function getLocale(){
    $locale = app()->getLocale();

    if ($locale == 'uz' ) $locale = 'uz_Latn';
    return $locale;

}


function setView($user)
{
    if (auth()->check()) {
        $user->performer_views()->where('user_id', auth()->user()->id)->first();

        if (!$user->performer_views()->where('user_id', auth()->user()->id)->first()) {
            $view = new UserView();
            $view->user_id = auth()->user()->id;
            $view->performer_id = $user->id;
            $view->save();
            return $view;
        }
    }
    return false;

}

function categories(){


    $datas = Category::with('translations')->get();

    $child_categories = [];
    $parent_categories = [];

    foreach ($datas as $data) {
        if ($data->parent_id == null)
        {
            $parent_categories[] = $data;
        }else{
            $child_categories[] = $data;
        }

    }

    foreach ($parent_categories as $parent_category) {

        foreach ($child_categories as $child_category) {
            if ($parent_category->id == $child_category->parent_id){
                $categories[$parent_category->id][] = $child_category;
            }

        }

    }



    return $categories;

}


function getAllCategories(){
    return Category::withTranslations()->get();
}

function getCategoriesByParent($parent){
    return Category::withTranslations(['uz','ru'])->where('parent_id', $parent)->get();
}
function getFaqCategories(){
    return FaqCategories::all();
}

function getAuthUserBalance(){
    return auth()->user() && auth()->user()->walletBalance ? auth()->user()->walletBalance->balance : null;
}

function taskGuard($task){
          if ($task->user_id != auth()->user()->id){
              abort(403);
          }
}

function generate_url() {
    return "http://127.0.0.1:7070/api/send-notification";
}
