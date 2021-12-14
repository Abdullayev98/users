<?php

use App\Http\Controllers\Controller;
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



Route::get('/performers', function () { return view('Performers.performers'); });

Route::get('/news', [NewsController::class, 'home']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/messages/chat/{id}', [ConversationController::class, 'showChat'])->name("conversation.index");
    Route::post('/messages/chat/rate/{message}', [ConversationController::class, 'rating'])->name("conversation.rating");
    Route::post('/messages/chat/close/{message}', [ConversationController::class, 'close'])->name("appeal.close");
    Route::post('/messages/chat/{id}', [ConversationController::class, 'send'])->name("conversation.send");
});


Route::get('/', [Controller::class, 'home']);

Route::get('/home/profile', [HomeController::class, 'profile']);


Route::get('/terms', function () {
    return view('terms.terms');
});
Route::get('/offer-tasks', function () {
    return view('task.offertasks');
});
Route::get('/my-tasks', function () {
    return view('task.mytasks');
});

Route::get('/refill', function() {
    return view('/Site/refill');
});

Route::get('/paycom', 'App\Http\Controllers\PaycomTransactionController@index');

Route::get('/ref', 'App\Http\Controllers\RefillController@ref');

Route::post('/prepare', "App\Http\Controllers\RefillController@prepare")->name('prepare');

Route::post('/complete', "App\Http\Controllers\RefillController@complete")->name('complete');
