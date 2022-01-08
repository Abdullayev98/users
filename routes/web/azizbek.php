<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaynetTransactionController;

// Paynet PayUz Repo
Route::any('/paynet',function(){
    (new PaynetTransactionController)->driver('paynet')->handle();
});