<?php

use App\Http\Controllers\API\FaqAPIController;
use App\Http\Controllers\API\NewsAPIController;
use App\Http\Controllers\API\ProfileAPIController;
use App\Http\Controllers\API\UserAPIController;
use App\Http\Controllers\API\PaymentAPIController;
use App\Http\Controllers\API\TaskAPIController;
use Illuminate\Http\Request;
use App\Http\Controllers\API\CategoriesAPIController;
use App\Http\Controllers\API\PerformerAPIController;
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
Route::middleware('auth:api')->group(function () {
    Route::post('task/create', [TaskAPIController::class, 'create']);
    Route::get('settings', [ProfileAPIController::class, 'settings']);
    Route::post('settings/update', [ProfileAPIController::class, 'settings_update']);
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
Route::get('faq/{id}', [FaqAPIController::class, 'questions']);
//News
Route::get('news', [NewsAPIController::class, 'index']);
Route::post('news/create', [NewsAPIController::class, 'create']);
Route::get('news/show/{id}', [NewsAPIController::class, 'show']);
//Profile
Route::get('profile/{id}', [ProfileAPIController::class, 'index']);
Route::patch('profile/{id}', [ProfileAPIController::class, 'update']);
//Tasks
Route::prefix("task")->group(function (){
    Route::get('/{id}', [TaskAPIController::class, 'task']);
    Route::get('/search/{s}', [TaskAPIController::class, 'search']);
});
//Categories
Route::get('/categories' , [CategoriesAPIController::class, 'index']);
//Performers
Route::get('/performers', [PerformerAPIController::class, 'service']);
Route::get('/performer/{id}', [PerformerAPIController::class, 'performer']);
