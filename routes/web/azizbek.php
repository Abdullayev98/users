<?php

use Illuminate\Support\Facades\Route;
use App\Services\Paynet\Services\PaynetService;
use App\Services\Paynet\Constants;
use App\Http\Controllers\PaynetTransactionController;
// Paynet Repo
Route::get('/payment/paynet', function(){
    $constants = new Constants();
    header("Content-Type: text/xml; charset=utf-8");
    $webService = new SoapServer($constants::$wsdl_url);
    $webService->setObject(new PaynetService());
    $webService->handle();
});

// Paynet PayUz Repo
Route::any('/paynet',function(){
    (new PaynetTransactionController)->driver('paynet')->handle();
});

Route::any('/handle/{paysys}',function($paysys){
    (new Goodoneuz\PayUz\PayUz)->driver($paysys)->handle();
});