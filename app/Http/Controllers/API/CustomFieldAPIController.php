<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class CustomFieldAPIController extends Controller
{
    public function getByCategoryId(Category $category)
    {

        return $category->custom_fields;
    }
    public function getByTaskId(Task $task)
    {

        return $task->custom_fields;
    }
}
