<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoriesAPIController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        return $categories;
    }
}
