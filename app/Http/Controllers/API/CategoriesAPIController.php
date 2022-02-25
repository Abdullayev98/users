<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoriesAPIController extends Controller
{
    public function index()
    {

        return Category::with('translations')->get();
    }
}
