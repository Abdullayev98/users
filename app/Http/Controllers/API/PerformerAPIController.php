<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Exception;

class PerformerAPIController extends Controller
{
    public function  service(){
       try{
           $categories = DB::table('categories')->get();
           $child_categories= DB::table('categories')->get();
           $users= User::where('role_id',2)->paginate(50);
           $data = ["categories"=>$categories, "child_categories"=>$child_categories,"users"=>$users];
           return response()->json($data);
       }catch (Exception $e) {
           $this->sendError($e->getMessage(), 200);
           return response()->json(['status' => 'false', 'message' => $e->getMessage(),200]);
       }
    }
}
