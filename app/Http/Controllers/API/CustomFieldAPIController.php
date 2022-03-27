<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class CustomFieldAPIController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/custom-field-by-category/{id}",
     *     tags={"Custom"},
     *     summary="Get by category ID",
     *     security={
     *      {"token": {}},
     *     },
     *     @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="successful operation",
     *     ),
     *     @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     */
    public function getByCategoryId($id)
    {

        //return $category->custom_fields;
        $data = Category::find($id);
        
        if($data){
            return response()->json($data, 200);
        }
        return response()->json('Бундай id ли категория йок', 404);
    }

    /**
     * @OA\Get(
     *     path="/api/custom-field-by-task/{id}",
     *     tags={"Custom"},
     *     summary="Get by task ID",
     *     security={
     *      {"token": {}},
     *     },
     *     @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="successful operation",
     *     ),
     *     @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     */
    public function getByTaskId($id)
    {
        //return $task->custom_fields;
        $data = Task::find($id);
        
        if($data){
            return response()->json($data, 200);
        }
        return response()->json('Бундай id ли task йок', 404);
    }
}
