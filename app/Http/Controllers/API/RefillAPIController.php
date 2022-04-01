<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\All_transaction;
use App\Models\Complete;
use App\Models\Prepare;
use App\Models\WalletBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefillAPIController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/ref",
     *     tags={"Refill"},
     *     summary="Get list of Refill",
     *     security={
     *         {"token": {}}
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="successful operation"
     *     ),
     *     @OA\Response(
     *          response=500,
     *          description="Ajax error"
     *     )
     * )
     */
    public function ref(Request $request){

        $payment = $request->get("paymethod");
        switch($payment){
            case 'Click':
                $new_article = All_transaction::create([
                    'user_id' => Auth::id(),
                    'amount'  => $request->get("amount"),
                    'method'  => "Click",
                ]);

                $amount = $request->get("amount");
                $article_id = $new_article->id;

                return redirect()->to("https://my.click.uz/services/pay?service_id=19839&merchant_id=14364&amount=$amount.00&transaction_param=$article_id&return_url=https://user.uz/profile");
                break;
            case 'PayMe':
                $tr = new All_transaction();
                $tr->user_id = Auth::id();
                $tr->amount  = $request->get("amount");
                $tr->method  = $tr::DRIVER_PAYME;
                $tr->state   = $tr::STATE_WAITING_PAY;
                $tr->save();
                
                return response()->json(['transaction' => $tr]);
                break;
            case 'Paynet':
                dd('Paynet testing');
                break;
        }

    }

    /**
     * 
     * @OA\Post (
     *     path="/api/prepare",
     *     tags={"Refill"},
     *     summary="Create new Prepare",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="click_trans_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="service_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="click_paydoc_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="merchant_trans_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="amount",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="action",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="error",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="error_note",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="sign_time",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="sign_string",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "click_trans_id":1613910471,
     *                     "service_id":19839,
     *                     "click_paydoc_id":1747426201,
     *                     "merchant_trans_id":201,
     *                     "amount":6000,
     *                     "action":0,
     *                     "error":0,
     *                     "error_note":"Success",
     *                     "sign_time":"2022-02-14 20:56:40",
     *                     "sign_string":"0fc2457d6db176d12f96b8af2aa25679",
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="click_trans_id", type="integer", example=1613910471),
     *              @OA\Property(property="service_id", type="integer", example=19839),
     *              @OA\Property(property="click_paydoc_id", type="integer", example=1747426201),
     *              @OA\Property(property="merchant_trans_id", type="integer", example=201),
     *              @OA\Property(property="amount", type="integer", example=6000),
     *              @OA\Property(property="action", type="integer", example=0),
     *              @OA\Property(property="error", type="integer", example=0),
     *              @OA\Property(property="error_note", type="string", example="Success"),
     *              @OA\Property(property="sign_time", type="string", example="2022-02-14 20:56:40"),
     *              @OA\Property(property="sign_string", type="string", example="0fc2457d6db176d12f96b8af2aa25679"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      ),
     *     security={
     *         {"token": {}}
     *     },
     * )
     */
    public function prepare(Request $request){

        $new_prepare = Prepare::create([

            'click_trans_id'=> $request->get("click_trans_id"),
            'service_id'=> $request->get("service_id"),
            'click_paydoc_id'=> $request->get("click_paydoc_id"),
            'merchant_trans_id'=> $request->get("merchant_trans_id"),
            'amount'=> $request->get("amount"),
            'action'=> $request->get("action"),
            'error'=> $request->get("error"),
            'error_note'=> $request->get("error_note"),
            'sign_time'=> $request->get("sign_time"),
            'sign_string'=> $request->get("sign_string"),


        ]);


        $click_trans_id = $new_prepare->click_trans_id;
        $merchant_trans_id = $new_prepare->merchant_trans_id;
        $merchant_prepare_id = $new_prepare->id;
        $error = $new_prepare->error;
        $error_note = $new_prepare->error_note;

        return response()->json([
            'data' => [
                'click_trans_id' => $click_trans_id,
                'merchant_trans_id' => $merchant_trans_id,
                'merchant_prepare_id' => $merchant_prepare_id,
                'error' => $error,
                'error_note' => $error_note
            ]
        ]);

    }


    /**
     * 
     * @OA\Post (
     *     path="/api/complete",
     *     tags={"Refill"},
     *     summary="Create new Complete",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="click_trans_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="service_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="click_paydoc_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="merchant_trans_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="merchant_prepare_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="amount",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="action",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="error",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="error_note",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="sign_time",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="sign_string",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "click_trans_id":1613910471,
     *                     "service_id":19839,
     *                     "click_paydoc_id":1747426201,
     *                     "merchant_trans_id":201,
     *                     "merchant_prepare_id":33,
     *                     "amount":6000,
     *                     "action":1,
     *                     "error":0,
     *                     "error_note":"Success",
     *                     "sign_time":"2022-02-14 20:56:40",
     *                     "sign_string":"0fc2457d6db176d12f96b8af2aa25679",
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="click_trans_id", type="integer", example=1613910471),
     *              @OA\Property(property="service_id", type="integer", example=19839),
     *              @OA\Property(property="click_paydoc_id", type="integer", example=1747426201),
     *              @OA\Property(property="merchant_trans_id", type="integer", example=201),
     *              @OA\Property(property="merchant_prepare_id", type="integer", example=33),
     *              @OA\Property(property="amount", type="integer", example=6000),
     *              @OA\Property(property="action", type="integer", example=0),
     *              @OA\Property(property="error", type="integer", example=0),
     *              @OA\Property(property="error_note", type="string", example="Success"),
     *              @OA\Property(property="sign_time", type="string", example="2022-02-14 20:56:40"),
     *              @OA\Property(property="sign_string", type="string", example="0fc2457d6db176d12f96b8af2aa25679"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      ),
     *     security={
     *         {"token": {}}
     *     },
     * )
     */
    public function complete(Request $request){

        $new_complete = Complete::create([

            'click_trans_id'=> $request->get("click_trans_id"),
            'service_id'=> $request->get("service_id"),
            'click_paydoc_id'=> $request->get("click_paydoc_id"),
            'merchant_trans_id'=> $request->get("merchant_trans_id"),
            'merchant_prepare_id'=> $request->get("merchant_prepare_id"),
            'amount'=> $request->get("amount"),
            'action'=> $request->get("action"),
            'error'=> $request->get("error"),
            'error_note'=> $request->get("error_note"),
            'sign_time'=> $request->get("sign_time"),
            'sign_string'=> $request->get("sign_string"),


        ]);

        $click_trans_id = $new_complete->click_trans_id;
        $merchant_trans_id = $new_complete->merchant_trans_id;
        $merchant_confirm_id = $new_complete->id;
        $error = $new_complete->error;
        $error_note = $new_complete->error_note;

        $user = All_transaction::where('id', $merchant_trans_id)->first();

        $balance = WalletBalance::where('user_id', $user->user_id)->first();

        if(isset($balance)){
            $summa = $balance->balance + $user->amount;
        }else{
            WalletBalance::create([
                'user_id'=> $user->id,
                'amount'=> $user->amount,
            ]);
            $summa = $user->amount;
        }

        WalletBalance::where('user_id', $user->user_id)->update(['balance' => $summa]);
        All_transaction::where('id', $user->id)->update(['status' => 1]);

        return response()->json([
            'data' => [
                'click_trans_id' => $click_trans_id,
                'merchant_trans_id' => $merchant_trans_id,
                'merchant_confirm_id' => $merchant_confirm_id,
                'error' => $error,
                'error_note' => $error_note
            ]
        ]);

    }
}
