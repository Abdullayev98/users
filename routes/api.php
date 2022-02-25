<?php

use App\Http\Controllers\API\CategoriesAPIController;
use App\Http\Controllers\API\CustomFieldAPIController;
use App\Http\Controllers\API\FaqAPIController;
use App\Http\Controllers\API\NewsAPIController;
use App\Http\Controllers\API\PerformerAPIController;
use App\Http\Controllers\API\ProfileAPIController;
use App\Http\Controllers\API\TaskAPIController;
use App\Http\Controllers\API\UserAPIController;
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

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [UserAPIController::class, 'logout']);

    Route::post('task/create', [TaskAPIController::class, 'create']);
    Route::get('settings', [ProfileAPIController::class, 'settings']);


    Route::get('/my-tasks', [TaskAPIController::class, 'my_tasks']);
    Route::post('/change-task/{task}', [TaskAPIController::class, 'changeTask']);
    Route::get('/custom-field-by-category/{category}',[CustomFieldAPIController::class,'getByCategoryId']);
    Route::get('/custom-field-by-task/{task}',[CustomFieldAPIController::class,'getByTaskId']);

});
//User Routes
Route::post('login', [UserAPIController::class, 'login']);
Route::post('register', [UserAPIController::class, 'register']);
Route::put('update/{id}', [UserAPIController::class, 'update']);
Route::delete('delete/{id}', [UserAPIController::class, 'destroy']);

// FAQ
Route::get('faq', [FaqAPIController::class, 'index']);
Route::get('faq/{faqs}', [FaqAPIController::class, 'questions']);
//News
Route::get('news', [NewsAPIController::class, 'index']);
Route::post('news/create', [NewsAPIController::class, 'create']);
Route::get('news/show/{id}', [NewsAPIController::class, 'show']);


//Tasks
Route::get('task/{task}', [TaskAPIController::class, 'task']);
Route::get('find', [TaskAPIController::class, 'search']);


//Categories
Route::get('/categories', [CategoriesAPIController::class, 'index']);
Route::get('/categories/{category}', [CategoriesAPIController::class, 'show']);
//Performers
Route::get('/performers', [PerformerAPIController::class, 'service']);
Route::get('/performers/{performer}', [PerformerAPIController::class, 'performer']);

