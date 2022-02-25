<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FaqCategories;
use App\Models\Faqs;
use PHPUnit\Exception;


class FaqAPIController extends Controller
{
    public function index(){
        return FaqCategories::all();
    }
    public function questions(Faqs $faqs){
        return $faqs;

    }
}
