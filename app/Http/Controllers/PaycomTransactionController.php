<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Paycom\PaycomApplication;

class PaycomTransactionController extends Controller
{
    public function index()
    {
        $application = new PaycomApplication([
            'merchant_id' => config('paycom.merchant'),
            'login'       => config('paycom.login'),
            'key'         => config('paycom.key'),
        ]);

     //   dd($application);
        $application->run();
    }
}
