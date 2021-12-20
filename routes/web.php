<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\PerformersController;
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
Route::get('/performers/executors-courier', function () {
    return view('Performers/executors-courier');
});

Route::get('/news', [NewsController::class, 'home']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['prefix' => 'performers'], function () {
    Route::get('/', [PerformersController::class, 'service']);
    Route::get('/{id}', [PerformersController::class, 'performer'])->name("performers.executors");
});
Route::get('/', [Controller::class, 'home']);

Route::get('/home/profile', [HomeController::class, 'profile'])->middleware('auth');
Route::get('/terms', [Controller::class, 'terms'])->name('terms');
Route::get('/offer-tasks', [Controller::class, 'offer_tasks'])->name('offer.tasks');
Route::get('/verification', [Controller::class, 'verification'])->name('verification');
Route::get('/my-tasks', [Controller::class, 'my_tasks'])->name('my.tasks');
Route::get('/refill', [Controller::class, 'refill'])->name('refill');
Route::get('/contacts', [Controller::class, 'contacts'])->name('contacts');
Route::get('/choose-task', [Controller::class, 'choose_task'])->name('choose.task');
Route::get('/terms/doc', [Controller::class, 'terms_doc'])->name('terms.doc');

Route::get('/paycom', 'App\Http\Controllers\PaycomTransactionController@index');

Route::get('/ref', 'App\Http\Controllers\RefillController@ref');

Route::post('/prepare', "App\Http\Controllers\RefillController@prepare")->name('prepare');

Route::post('/complete', "App\Http\Controllers\RefillController@complete")->name('complete');

//social login facebook
Route::group(['prefix' => 'login/facebook'], function () {
    Route::get('/',[SocialController::class,'facebookRedirect']);
    Route::get('/callback',[SocialController::class,'loginWithFacebook']);

});


//social login google
Route::group(['prefix' => 'login/google'], function () {
    Route::get('/',[SocialController::class,'googleRedirect']);
    Route::get('/callback',[SocialController::class,'loginWithGoogle']);
});

Route::view('/faq','faq.faq');

Route::view('/reviews','reviews.review');

Route::view('/author-reviews','reviews.authors_reviews');

Route::view('/press','reviews.CMI');

Route::view('/vacancies','reviews.vacancies');

Route::view('/blog','Site.blog');
