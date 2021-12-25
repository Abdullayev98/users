<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paycom\PaycomApplication;
use App\Services\Payme\Application;

class PaycomTransactionController extends Controller
{
    public function index()
    {
        $application = new Application();
        return $application->run();

        // $config = [
        //     'login'    => 'Paycom',
        //     'merchant' => config('constants.paycom.paycom_merchant'),
        //     'key'      => config('constants.paycom.paycom_key'),
        //     'key_test' => config('constants.paycom.paycom_key_test'),
        // ];
        // $application = new PaycomApplication($config);
        // $application->run();
    }
}
