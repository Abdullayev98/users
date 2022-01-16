<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/categories/{id}', [Controller::class, 'category'])->name("categories");
Route::get('/lang/{lang}', [Controller::class, 'lang'])->name('lang');



Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/', [UserController::class, 'createSignin'])->name('signin.custom');


Route::get('/register', [UserController::class, 'signup'])->name('register');
Route::post('/create-user', [UserController::class, 'customSignup'])->name('user.registration');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/reset', [UserController::class, 'reset'])->name('reset');

Route::get('/confirm', [UserController::class, 'confirm'])->name('confirm');

//Route::get('dashboard', [UserController::class, 'dashboardView'])->middleware(['auth', 'is_verify_email']);
Route::get('dashboard', [UserController::class, 'dashboardView'])->middleware(['auth']);
Route::get('account/verify/{token}', [UserController::class, 'verifyAccount'])->name('user.verify');


