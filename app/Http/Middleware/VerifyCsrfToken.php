<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/handle/*',
        '/paynet',
        '/paycom/pay',
        '/prepare',
        '/complete',
        '/clprepare',
        '/clcomplete',
        '/sms/*',
        "task/create/note/*/images/store"
//        '/send-review/*'
    ];
}
