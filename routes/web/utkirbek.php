<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;


Route::get('/categories/{id}', [Controller::class, 'category'])->name("categories");
Route::get('/lang/{lang}', [Controller::class, 'lang'])->name('lang');



Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'loginPost'])->name('signin.custom')->middleware('guest');


Route::get('/register', [UserController::class, 'signup'])->name('register');
Route::post('/register', [LoginController::class, 'customRegister'])->name('user.registration');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/reset', [UserController::class, 'reset'])->name('reset');

Route::get('/confirm', [UserController::class, 'confirm'])->name('confirm');

//Route::get('dashboard', [UserController::class, 'dashboardView'])->middleware(['auth', 'is_verify_email']);



Route::get('dashboard', [UserController::class, 'dashboardView'])->middleware(['auth']);
Route::get('account/verify/', [LoginController::class, 'verifyAccount'])->name('user.verify')->middleware('auth');
Route::get('account/verification/email', [LoginController::class, 'send_email_verification'])->name('user.verify.send')->middleware('auth');
Route::get('account/verification/phone', [LoginController::class, 'send_phone_verification'])->name('user.verify.phone.send')->middleware('auth');
Route::post('account/verification/phone', [LoginController::class, 'verify_phone'])->name('user.verify.phone.submit')->middleware('auth');
Route::post("account/change/email", [LoginController::class,'change_email'])->name('user.email.change')->middleware('auth');
Route::post("account/change/phone", [LoginController::class,'change_phone_number'])->name('user.phone.change')->middleware('auth');
Route::post("account/change/phone/send", [LoginController::class,'verify_phone'])->name('user.phone.verify')->middleware('auth');


