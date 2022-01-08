<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FaqCategories;
use App\Models\Faqs;
use PHPUnit\Exception;


class FaqAPIController extends Controller
{
    public function index(){
        try {
            $fc = FaqCategories::all();
            return response()->json($fc);
        }catch (Exception $e){
            $this->sendError($e->getMessage(), 200);
            return response()->json(['status' => 'false', 'message' => $e->getMessage(),200]);
        }
    }
    public function questions($id){
        try {
            $fq = Faqs::where('category_id',$id)->get();
            $fc = FaqCategories::where('id',$id)->first();
            $data = [$fq,$fc];
            return response()->json($data);
        }catch (Exception $e){
            $this->sendError($e->getMessage(), 200);
            return response()->json(['status' => 'false', 'message' => $e->getMessage(),200]);
        }

    }
}
