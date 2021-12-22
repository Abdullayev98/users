<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/performers', function () { return view('Performers.performers'); });

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/', [UserController::class, 'createSignin'])->name('signin.custom');


Route::get('/register', [UserController::class, 'signup'])->name('register');
Route::post('/create-user', [UserController::class, 'customSignup'])->name('user.registration');


Route::get('/dashboard', [UserController::class, 'dashboardView'])->name('dashboard');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
