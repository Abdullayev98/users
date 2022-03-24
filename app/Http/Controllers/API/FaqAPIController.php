<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FaqCategories;
use App\Models\Faqs;
use PHPUnit\Exception;


class FaqAPIController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/faq",
     *     tags={"FAQ"},
     *     summary="Get list of FAQ",
     *     @OA\Response (
     *          response=200,
     *          description="Successful operation"
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *     )
     * )
     */
    public function index(){
        return FaqCategories::all();
    }
    public function questions(Faqs $faqs){
        return $faqs;

    }
}
