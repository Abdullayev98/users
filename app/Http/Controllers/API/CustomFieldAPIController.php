<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CustomField;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class CustomFieldAPIController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/custom-field-by-category/{category}",
     *     tags={"CustomField"},
     *     summary="Get by category ID",
     *     security={
     *      {"token": {}},
     *     },
     *     @OA\Parameter(
     *          in="path",
     *          name="category",
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
    public function getByCategoryId(Category $category)
    {

        return $category->custom_fields;
    }


    /**
     * @OA\Get(
     *     path="/api/custom-field-values-by-custom-field/{custom_field}",
     *     tags={"CustomField"},
     *     summary="Get custom-field by ID",
     *     security={
     *      {"token": {}},
     *     },
     *     @OA\Parameter(
     *          in="path",
     *          name="custom_field",
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
    public function getByCustomFieldId(CustomField $custom_field)
    {

        return $custom_field->custom_field_values;
    }

    /**
     * @OA\Get(
     *     path="/api/custom-field-values-by-task/{task}",
     *     tags={"CustomField"},
     *     summary="Get by task ID",
     *     security={
     *      {"token": {}},
     *     },
     *     @OA\Parameter(
     *          in="path",
     *          name="task",
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
    public function getByTaskId(Task $task)
    {
        return $task->custom_field_values;
//        $data = Task::find($id);
//
//        if($data){
//            return response()->json($data, 200);
//        }
//        return response()->json('Бундай id ли task йок', 404);
    }
}
