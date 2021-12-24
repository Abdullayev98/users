<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\PerformersController;
use App\Http\Controllers\admin\VoyagerUserController;
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



Route::get('/performers', [PerformersController::class, 'service']);
Route::get('perf-ajax/{id}', [PerformersController::class, 'perf_ajax']);
Route::get('/executors-courier', function () {
    return view('Performers/executors-courier');
});
Route::group(['prefix' => 'performers'], function () {
Route::get('/', [PerformersController::class, 'service']);
Route::get('/{id}', [PerformersController::class, 'performer'])->name('performer.main');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get("users/activitiy/{user}", [VoyagerUserController::class, "activity"])->name("users.activity");
    Route::get('/messages/chat/{id}', [ConversationController::class, 'showChat'])->name("conversation.index");
    Route::post('/messages/chat/rate/{message}', [ConversationController::class, 'rating'])->name("conversation.rating");
    Route::post('/messages/chat/close/{message}', [ConversationController::class, 'close'])->name("appeal.close");
    Route::post('/messages/chat/{id}', [ConversationController::class, 'send'])->name("conversation.send");
});


Route::get('/', [Controller::class, 'home'])->name('home');

//Route::get('/home/profile', [HomeController::class, 'profile']);

Route::get('/detailed-tasks', function () {
    return view('task.detailed-tasks');
});

Route::get('/terms', function () {
    return view('terms.terms');
});
Route::get('/offer-tasks', function () {
    return view('task.offertasks');
});

Route::get('/verification', function () {
    return view('create.verification');
});

Route::get('/my-tasks', [Controller::class, 'my_tasks'])->name('my.tasks');
Route::get('/refill', function() {
    return view('/Site/refill');
});

Route::get('/contacts', function() {
    return view('contacts.contacts');
});

Route::get('/choose-task', function() {
    return view('task.choosetasks');
});

Route::get('/terms/doc', function() {
    return view('terms.pdf');
});
Route::post('/paycom', 'App\Http\Controllers\PaycomTransactionController@index');

Route::get('/ref', 'App\Http\Controllers\RefillController@ref');

Route::post('/prepare', "App\Http\Controllers\RefillController@prepare")->name('prepare');

Route::post('/complete', "App\Http\Controllers\RefillController@complete")->name('complete');

//social login facebook
Route::get('login/facebook',[SocialController::class,'facebookRedirect']);
Route::get('login/facebook/callback',[SocialController::class,'loginWithFacebook']);

//social login google
Route::get('login/google',[SocialController::class,'googleRedirect']);
Route::get('login/google/callback',[SocialController::class,'loginWithGoogle']);

Route::view('/faq','faq.faq');

Route::view('/reviews','reviews.review');

Route::view('/author-reviews','reviews.authors_reviews');

Route::view('/press','reviews.CMI');

Route::view('/vacancies','reviews.vacancies');


Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [NewsController::class, 'home']);
    Route::get('/{id}', [NewsController::class, 'get'])->name("Site.blog");
});
