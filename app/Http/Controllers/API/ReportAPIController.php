<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Report;
use App\Models\Category;
use App\Models\Task;

class ReportAPIController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/admin/reports",
     *     tags={"Report"},
     *     summary="Get list of Reports",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *          response=500,
     *          description="Server error"
     *     )
     * )
     */
    public function index(Report $report)
    {
        $table = $report->getTable();

        $columns = DB::select( 'SHOW FULL COLUMNS FROM reports' );
        $task_parent = Category::where('parent_id', null)->get();
        $task = Task::where('category_id', $task_parent)->count();
        
        return response()->json([
            'data' => [
                'task' => $task,
                'report' => $report,
                'table' => $table,
                'columns' => $columns,
                'task_parent' => $task_parent
            ]
        ]);
    }
}
