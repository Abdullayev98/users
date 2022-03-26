<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoriesAPIController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/categories",
     *     tags={"Categories"},
     *     summary="Get list of Category",
     *     @OA\Response(
     *          response=200,
     *          description="successful operation",
     *     )
     * )
     */
    public function index()
    {

        return Category::with('translations')->get();
    }

    /**
     * @OA\Get(
     *     path="/api/categoriess/{id}",
     *     tags={"Categories"},
     *     summary="Get list of Category",
     *     @OA\Response(
     *          response=200,
     *          description="successful operation",
     *     ),
     *     @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     * )
     */
    public function show(Category $category){
        return $category;
    }
}
