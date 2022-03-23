<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Task\UpdateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\PerformersController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RefillController;
use App\Http\Controllers\Task\SearchTaskController;
use App\Http\Controllers\admin\VoyagerUserController;
use App\Http\Controllers\MassmediaController;
use App\Http\Controllers\Task\CreateController;

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

Route::group(['middleware'=>'auth'], function (){
    Route::get('/my-tasks', [Controller::class, 'my_tasks'])->name('task.mytasks');
});


Route::get('/for_del_new_task/{task}', [CreateController::class, 'deletetask']);
Route::group(['middleware'=> 'auth'], function (){
    Route::delete('/fordelnotif/{notification}/', [PerformersController::class, 'deleteNotification'])->name('notification.delete');

});

Route::post('del-notif', [PerformersController::class, 'del_all_notif']);
Route::post('/performers', [PerformersController::class, 'service']);
Route::get('perf-ajax/{id}', [PerformersController::class, 'perf_ajax']);
Route::get('/executors-courier', function () {
    return view('Performers/executors-courier');
});
Route::group(['prefix' => 'performers'], function () {
Route::get('/', [PerformersController::class, 'service'])->name('performers');
Route::get('/{user}', [PerformersController::class, 'performer'])->name('performer.main');
Route::get('/chat/{id}', [PerformersController::class, 'performer_chat'])->name('personal.chat');
});

Route::post('give-task', [PerformersController::class, 'give_task']);

Route::post('ajax-request', [SearchTaskController::class, 'task_response']);
Route::delete('delete-task/{task}', [SearchTaskController::class, 'delete_task'])->name('delete.task');
Route::get('/detailed-tasks/{task}', [SearchTaskController::class, 'task'])->name("tasks.detail");
Route::post('/detailed-tasks', [SearchTaskController::class, 'comlianse_save'])->name("tasks.detailed");
Route::get('/change-task/{task}', [SearchTaskController::class, 'changeTask'])->name("task.changetask")->middleware('auth');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/reports', [ReportController::class, 'index'])->name("voyager.reports.index");
    Route::get("users/activitiy/{user}", [VoyagerUserController::class, "activity"])->name("users.activity");
    Route::get('/messages/chat/{id}', [ConversationController::class, 'showChat'])->name("conversation.index");
    Route::post('/messages/chat/rate/{message}', [ConversationController::class, 'rating'])->name("conversation.rating");
    Route::post('/messages/chat/close/{message}', [ConversationController::class, 'close'])->name("appeal.close");
    Route::post('/messages/chat/{id}', [ConversationController::class, 'send'])->name("conversation.send");
});

Route::get('/', [Controller::class, 'home'])->name('home');



Route::put('/change-task/{task}', [UpdateController::class,'__invoke'])->name("task.update")->middleware('auth');

Route::view('/offer-tasks','task.offertasks');
Route::group(['middleware'=>'auth', 'prefix' => 'verification'], function (){
    Route::get('/',[ProfileController::class, 'verificationIndex'])->name('verification');

    Route::get('/personalinfo',[ProfileController::class, 'verificationInfo'])->name('verification.info');
    Route::post('/personalinfo',[ProfileController::class, 'verificationInfoStore'])->name('verification.info.store');

    Route::get('/personalinfo/contact',[ProfileController::class, 'verificationContact'])->name('verification.contact');
    Route::post('/personalinfo/contact',[ProfileController::class, 'verificationContactStore'])->name('verification.contact.store');

    Route::get('/personalinfo/photo',[ProfileController::class, 'verificationPhoto'])->name('verification.photo');
    Route::put('/personalinfo/photo',[ProfileController::class, 'verificationPhotoStore'])->name('verification.photo.store');

    Route::get('/personalinfo/category',[ProfileController::class, 'verificationCategory'])->name('verification.category');
    Route::post('/personalinfo/category',[ProfileController::class, 'getCategory'])->name('verification.category.store');
});


Route::get('send', [RefillController::class, 'ref'])->name('paycom.send');


Route::get('/choose-task', function() {
    return view('task.choosetasks');
});

Route::get('/ref', 'App\Http\Controllers\RefillController@ref');

Route::post('/prepare', "App\Http\Controllers\RefillController@prepare")->name('prepare');

Route::post('/complete', "App\Http\Controllers\RefillController@complete")->name('complete');

Route::post('/paycom', 'App\Http\Controllers\PaycomTransactionController@paycom')->name('paycom');
//social login facebook
Route::get('login/facebook',[SocialController::class,'facebookRedirect'])->name('auth.facebook');
Route::get('login/facebook/callback',[SocialController::class,'loginWithFacebook']);

//social login google
Route::get('login/google',[SocialController::class,'googleRedirect'])->name('auth.google');
Route::get('login/google/callback',[SocialController::class,'loginWithGoogle']);

Route::view('/faq','faq.faq');

Route::view('/reviews','reviews.review');

Route::view('/author-reviews','reviews.authors_reviews');

Route::get('/press',[MassmediaController::class, 'index'])->name('massmedia');

Route::view('/vacancies','reviews.vacancies');


Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [NewsController::class, 'home']);
    Route::get('/{id}', [NewsController::class, 'get'])->name("Site.blog");
});
