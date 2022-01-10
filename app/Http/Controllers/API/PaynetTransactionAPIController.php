<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use PayUz\Commons\Paynet as PaynetSystem;
use PayUz\PaymentException;

class PaynetTransactionAPIController extends Controller
{
    protected $driverClass = null;

    const PAYNET = 'paynet';

    public function driver($driver = null){
        switch ($driver){
            case self::PAYNET:
                $this->driverClass = new PaynetSystem;
                break;
        }
        // TODO Other payment system
        return $this;
    }

    public function handle(){
        $this->validateDriver();
        try{
            return $this->driverClass->run();
        }catch(PaymentException $e){
            return $e->response();
        }

        return $this;
    }

    public function validateDriver(){
        if (is_null($this->driverClass))
            throw new \Exception('Driver not selected');
    }
}
