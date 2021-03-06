<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Report $report)
    {
        $table = $report->getTable();

        $columns = DB::select( 'SHOW FULL COLUMNS FROM reports' );
        $task_parent = Category::where('parent_id', null)->get();
        $task = Task::where('category_id', $task_parent)->count();
        
        return view('vendor.voyager.report.report', compact('task','report','table','columns','task_parent'));
    }
}
