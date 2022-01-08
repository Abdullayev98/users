<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayUz\PaymentException;
use PayUz\Commons\Paynet as PaynetSystem;


class PaynetTransactionController extends Controller
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
