<?php

use App\Models\Category;
use App\Models\FaqCategories;

if (!function_exists('amount_format')) {
    function amount_format($amount)
    {
        return number_format((int)$amount, 0, ",", ".").' UZS';
    }
}

function getMyText(){
    return 'Hello World';
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
    return Category::withTranslations()->where('parent_id', $parent)->get();
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
