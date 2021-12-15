<?php

use Illuminate\Support\Facades\Route;
use App\Services\Paynet\Constants;
use services\PaynetService;

Route::get('/payment/paynet', function(){
    header("Content-Type: text/xml; charset=utf-8");
    $webService = new SoapServer(Constants::WSDL_URL);
    $webService->setObject(new PaynetService());
    $webService->handle();
});