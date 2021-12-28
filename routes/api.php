<?php

use App\Http\Controllers\API\FaqAPIController;
use App\Http\Controllers\API\NewsAPIController;
use App\Http\Controllers\API\ProfileAPIController;
use App\Http\Controllers\API\UserAPIController;
use App\Http\Controllers\API\PaymentAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//User Routes
Route::get('users', [UserAPIController::class, 'index']);
Route::post('login', [UserAPIController::class, 'login']);
Route::post('register', [UserAPIController::class, 'register']);
Route::put('update/{id}', [UserAPIController::class, 'update']);
Route::get('logout', [UserAPIController::class, 'logout']);
Route::delete('delete/{id}', [UserAPIController::class, 'destroy']);

// FAQ
Route::get('faq', [FaqAPIController::class, 'index']);
//News
Route::get('news', [NewsAPIController::class, 'index']);
Route::post('news/create', [NewsAPIController::class, 'create']);
Route::get('news/show/{id}', [NewsAPIController::class, 'show']);
//Profile
Route::get('profile/{id}', [ProfileAPIController::class, 'index']);
Route::patch('profile/{id}', [ProfileAPIController::class, 'update']);
