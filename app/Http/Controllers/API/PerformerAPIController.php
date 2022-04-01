<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserView;
use App\Services\Payme\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class PerformerAPIController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/performers",
     *     tags={"Performers"},
     *     summary="Get list of Performers",
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *     )
     * )
     *
     */
    public function service()
    {

        return User::where('role_id', 2)->get();
    }

    /**
     * @OA\Get(
     *     path="/api/performers/{performer}",
     *     tags={"Performers"},
     *     summary="Get list of Performers",
     *     @OA\Parameter(
     *          in="path",
     *          name="performer",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *     )
     * )
     *
     */
    public function performer(User $performer)
    {
        setView($performer);

        return $performer->role_id == 5? $performer:abort(404);
    }


    public function getByCategories()
    {
        return response()->json(['id' => request()->category_id]);
    }
}
