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
     *     summary="Get of FAQ",
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
    /**
     * @OA\Get(
     *     path="/api/faq/{id}",
     *     tags={"FAQ"},
     *     summary="Get of questions in FAQ",
     *     @OA\Parameter (
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema (
     *              type="string"
     *          )
     *     ),
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
    /* public function questions($id){
        $data = Faqs::find($id);
        
        if($data){
            return response()->json($data, 200);
        }
        return response()->json('Бундай малумот йок', 404);
    } */

    public function questions($id)
    {
        $fq = Faqs::withTranslations(['ru', 'uz'])->where('category_id', $id)->get();
        $fc = FaqCategories::withTranslations(['ru', 'uz'])->where('id', $id)->first();
        
        return response()->json([
            'data' => [
                'faqs' => $fq,
                'faqcategories' => $fc
            ]
        ]);
    }
}
