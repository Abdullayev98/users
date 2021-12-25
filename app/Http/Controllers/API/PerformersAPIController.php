<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerformersAPIController extends Controller
{
    public function index(){
        $categories = DB::table('categories')->get();
        return response->json($categories);
    }
}
