<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\NewsController;

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


Route::get('/news', [NewsController::class, 'home']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/messages/chat/{id}', [ConversationController::class, 'showChat'])->name("conversation.index");
    Route::post('/messages/chat/rate/{message}', [ConversationController::class, 'rating'])->name("conversation.rating");
    Route::post('/messages/chat/close/{message}', [ConversationController::class, 'close'])->name("appeal.close");
    Route::post('/messages/chat/{id}', [ConversationController::class, 'send'])->name("conversation.send");
});


Route::get('/home', function () {
    return view('home');
});

Route::get('/home/profile', function() {
    return view('/Profile/profile');
});
