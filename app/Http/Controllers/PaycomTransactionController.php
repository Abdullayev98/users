<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Payme\Application;

class PaycomTransactionController extends Controller
{
    public function paycom()
    {
        $application = new Application();
        return $application->run();
    }
}
