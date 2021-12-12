<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/messages/chat/{id}', [MessageController::class, 'showChat'])->name("conversation.index");
//    Route::post('/messages/chat/rate/{message}', [MessageController::class, 'rating'])->name("conversation.rating");
    Route::post('/messages/chat/close/{message}', [MessageController::class, 'close'])->name("appeal.close");
    Route::post('/messages/chat/{id}', [MessageController::class, 'send'])->name("conversation.send");
});


Route::get('/home', function () {
    return view('home');
});

Route::get('/home/profile', function() {
    return view('/Profile/profile');
});
Route::get('/create/task', function() {
    return view('/create/create');
});
