<?php

use Illuminate\Support\Facades\Route;
use App\Services\Paynet\Services\PaynetService;
use App\Services\Paynet\Constants;

Route::get('/payment/paynet', function(){
    $constants = new Constants();
    header("Content-Type: text/xml; charset=utf-8");
    $webService = new SoapServer($constants::$wsdl_url);
    $webService->setObject(new PaynetService());
    $webService->handle();
});