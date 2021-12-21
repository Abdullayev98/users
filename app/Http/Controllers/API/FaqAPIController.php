<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FaqCategories;
use App\Models\Faqs;


class FaqAPIController extends Controller
{
    public function index(){
        $fc = FaqCategories::all();
        return response()->json($fc);
    }
}
