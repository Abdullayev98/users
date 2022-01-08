<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Payme\Application;

class PaycomTransactionAPIController extends Controller
{
    public function paycom()
    {
        $application = new Application();
        return $application->run();
    }
}
