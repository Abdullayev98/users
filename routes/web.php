<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Voyager;

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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/messages/chat/{id}', [MessageController::class, 'showChat'])->name("conversation.index");
    Route::post('/messages/chat/close/{message}', [MessageController::class, 'close'])->name("appeal.close");
    Route::post('/messages/chat/{id}', [MessageController::class, 'send'])->name("conversation.send");
});

Route::get('/', [Controller::class, 'home'])->name('home');
Route::get('/performers', [Controller::class, 'performers'])->name('performers');
Route::get('/location/create', [Controller::class, 'location_create'])->name('location.create');
