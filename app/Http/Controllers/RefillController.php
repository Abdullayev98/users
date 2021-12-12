<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prepare;
use App\Models\Complete;
use App\Models\WalletBalance;

class RefillController extends Controller
{

public function ref(Request $request){

    if($request->get("paymethod") == 'Click'){



      return redirect()->to("https://my.click.uz/services/pay?service_id=1111&merchant_id=1111&amount=1111.00&transaction_param=1111&return_url=http://teampro.uz");

      }

    if($request->get("paymethod") == 'PayMe'){

        //Integration with PayMe

    }

}

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

    return ['click_trans_id' => $click_trans_id,'merchant_trans_id' => $merchant_trans_id,'merchant_prepare_id' => $merchant_prepare_id,'error' => $error,'error_note' => $error_note];

}


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

    $balance = WalletBalance::where('id', $merchant_trans_id);

    WalletBalance::where('id', $merchant_trans_id)->update(['status_pay' => 1]);

    return ['click_trans_id' => $click_trans_id,'merchant_trans_id' => $merchant_trans_id,'merchant_confirm_id' => $merchant_confirm_id,'error' => $error,'error_note' => $error_note];

}

}
