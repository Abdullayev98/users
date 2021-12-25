<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Paycom\PaycomApplication;

class PaycomTransactionController extends Controller
{
    public function index()
    {
        $application = new \App\Services\Paycom\PaycomApplication([
            'merchant_id' => config('constants.paycom.paycom_merchant'),
            'login'       => config('constants.paycom.paycom_login'),
            'key'         => config('constants.paycom.paycom_key'),
        ]);
        //dd($application);
        $application->run();
    }
}
