<?php

use App\Http\Controllers\API\PerformerAPIController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FaqsController;

// javoxir
use App\Http\Controllers\LoginController;

//avacoder
use App\Http\Controllers\ProfileController;

//++
use App\Http\Controllers\Task\ResponseController;
use App\Http\Controllers\Task\UpdateController;
use App\Http\Controllers\UserController;

//avocoder
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConversationController;

// javoxir
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialController;

// avocoder
use App\Http\Controllers\PerformersController;

//++
use App\Http\Controllers\ReportController;

// javoxir
use App\Http\Controllers\RefillController;

// javoxir
use App\Http\Controllers\Task\SearchTaskController;

// javoxir
use App\Http\Controllers\admin\VoyagerUserController;

// javoxir
use App\Http\Controllers\MassmediaController;

// javoxir
use App\Http\Controllers\Task\CreateController;

//avocoder

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/my-tasks', [Controller::class, 'my_tasks'])->name('task.mytasks'); // javoxir
});


Route::get('/for_del_new_task/{task}', [CreateController::class, 'deletetask']); // javoxir
Route::group(['middleware' => 'auth'], function () {
    Route::delete('/fordelnotif/{notification}/', [PerformersController::class, 'deleteNotification'])->name('notification.delete'); // javoxir

});

Route::post('del-notif', [PerformersController::class, 'del_all_notif']); // javoxir
Route::post('/performers', [PerformersController::class, 'service']); // javoxir
Route::get('perf-ajax/{id}', [PerformersController::class, 'perf_ajax']); // javoxir
Route::get('/executors-courier', function () {
    return view('Performers/executors-courier');
}); // javoxir
Route::group(['prefix' => 'performers'], function () {
    Route::get('/', [PerformersController::class, 'service'])->name('performers'); // javoxir
    Route::get('/{user}', [PerformersController::class, 'performer'])->name('performer.main'); // javoxir
    Route::get('/chat/{id}', [PerformersController::class, 'performer_chat'])->name('personal.chat'); // javoxir
});

Route::post('give-task', [PerformersController::class, 'give_task']); // javoxir

Route::post('ajax-request', [SearchTaskController::class, 'task_response']); // javoxir
Route::delete('delete-task/{task}', [SearchTaskController::class, 'delete_task'])->name('delete.task'); // javoxir
Route::get('/detailed-tasks/{task}', [SearchTaskController::class, 'task'])->name("tasks.detail"); // javoxir
Route::post('/detailed-tasks', [SearchTaskController::class, 'comlianse_save'])->name("tasks.detailed");
Route::get('/change-task/{task}', [SearchTaskController::class, 'changeTask'])->name("task.changetask")->middleware('auth'); // javoxir

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/reports', [ReportController::class, 'index'])->name("voyager.reports.index"); // javoxir
    Route::get("users/activitiy/{user}", [VoyagerUserController::class, "activity"])->name("users.activity"); // javoxir
    Route::get('/messages/chat/{id}', [ConversationController::class, 'showChat'])->name("conversation.index"); // javoxir
    Route::post('/messages/chat/rate/{message}', [ConversationController::class, 'rating'])->name("conversation.rating"); // javoxir
    Route::post('/messages/chat/close/{message}', [ConversationController::class, 'close'])->name("appeal.close"); // javoxir
    Route::post('/messages/chat/{id}', [ConversationController::class, 'send'])->name("conversation.send"); // javoxir
});

Route::get('/', [Controller::class, 'home'])->name('home'); // javoxir


Route::get('task-search', [SearchTaskController::class, 'task_search'])->name('task.search'); // javoxir
Route::get('tasks-search', [SearchTaskController::class, 'ajax_tasks'])->name('tasks.search');
Route::get('my-tasks', [SearchTaskController::class, 'my_tasks'])->name('task.mytasks');
Route::get('search', [SearchTaskController::class, 'search'])->name('search'); // javoxir

Route::put('/change-task/{task}', [UpdateController::class, '__invoke'])->name("task.update")->middleware('auth'); // javoxir

Route::view('/offer-tasks', 'task.offertasks');
Route::group(['middleware' => 'auth', 'prefix' => 'verification'], function () {
    Route::get('/', [ProfileController::class, 'verificationIndex'])->name('verification'); // javoxir

    Route::get('/personalinfo', [ProfileController::class, 'verificationInfo'])->name('verification.info'); // javoxir
    Route::post('/personalinfo', [ProfileController::class, 'verificationInfoStore'])->name('verification.info.store'); // javoxir

    Route::get('/personalinfo/contact', [ProfileController::class, 'verificationContact'])->name('verification.contact'); // javoxir
    Route::post('/personalinfo/contact', [ProfileController::class, 'verificationContactStore'])->name('verification.contact.store'); // javoxir

    Route::get('/personalinfo/photo', [ProfileController::class, 'verificationPhoto'])->name('verification.photo'); // javoxir
    Route::put('/personalinfo/photo', [ProfileController::class, 'verificationPhotoStore'])->name('verification.photo.store'); // javoxir

    Route::get('/personalinfo/category', [ProfileController::class, 'verificationCategory'])->name('verification.category'); // javoxir
    Route::post('/personalinfo/category', [ProfileController::class, 'getCategory'])->name('verification.category.store'); // javoxir
});


Route::get('send', [RefillController::class, 'ref'])->name('paycom.send'); // javoxir


Route::get('/choose-task', function () {
    return view('task.choosetasks');
}); // javoxir

Route::get('/ref', 'App\Http\Controllers\RefillController@ref'); // javoxir

Route::post('/prepare', "App\Http\Controllers\RefillController@prepare")->name('prepare'); // javoxir

Route::post('/complete', "App\Http\Controllers\RefillController@complete")->name('complete'); // javoxir

Route::post('/paycom', 'App\Http\Controllers\PaycomTransactionController@paycom')->name('paycom'); // javoxir
//social login facebook
Route::get('login/facebook', [SocialController::class, 'facebookRedirect'])->name('auth.facebook');
Route::get('login/facebook/callback', [SocialController::class, 'loginWithFacebook']);

//social login google
Route::get('login/google', [SocialController::class, 'googleRedirect'])->name('auth.google');
Route::get('login/google/callback', [SocialController::class, 'loginWithGoogle']);

Route::view('/faq', 'faq.faq');

Route::view('/reviews', 'reviews.review');

Route::view('/author-reviews', 'reviews.authors_reviews');

Route::get('/press', [MassmediaController::class, 'index'])->name('massmedia'); // javoxir

Route::view('/vacancies', 'reviews.vacancies');


Route::get('/geotaskshint', [Controller::class, 'geotaskshint'])->name('geotaskshint'); // javoxir
Route::get('/security', [Controller::class, 'security'])->name('security'); // javoxir
Route::get('/badges', [Controller::class, 'badges'])->name('badges'); // javoxir

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('profile')->group(function () {
        //Profile
        Route::get('/', [ProfileController::class, 'profileData'])->name('userprofile'); // javoxir
        Route::put('/updateuserphoto', [ProfileController::class, 'updates'])->name('update.photo');

        //Profile cash
        Route::get('/cash', [ProfileController::class, 'profileCash'])->name('userprofilecash'); // javoxir

        // Profile settings
        Route::get('/settings', [ProfileController::class, 'editData'])->name('editData');
        Route::post('/settings/update', [ProfileController::class, 'updateData'])->name('updateData');

        // Profile delete
        Route::get('/delete/{id}', [ProfileController::class, 'destroy'])->name('users.delete'); // javoxir

        //added category id
        Route::post('/getcategory', [ProfileController::class, 'getCategory'])->name('get.category'); // javoxir

        Route::post('/insertdistrict', [ProfileController::class, 'StoreDistrict'])->name('insert.district'); // javoxir

        Route::post('/store/profile/image', [ProfileController::class, 'storeProfileImage'])->name('profile.image.store'); // javoxir
        Route::post('/comment', [ProfileController::class, 'comment'])->name('comment'); // javoxir
        Route::post('/testBase', [ProfileController::class, 'testBase'])->name('testBase'); // javoxir

        //description
        Route::post('/description', [ProfileController::class, 'EditDescription'])->name('edit.description'); // javoxir

        //create_port
        Route::view('/create', 'profile/create_port');
        Route::post('/portfolio/create', [ProfileController::class, 'createPortfolio'])->name('portfolio.create'); // javoxir
        Route::get('/portfolio/{portfolio}', [ProfileController::class, 'portfolio'])->name('portfolio'); // javoxir
        Route::post('/delete/portfolio/{portfolio}', [ProfileController::class, 'delete'])->name('portfolio.delete'); // javoxir
    });
});
Route::post('/storepicture', [ProfileController::class, 'UploadImage'])->name('storePicture');


Route::prefix("task")->group(function () {
    Route::prefix("create")->group(function () {
        Route::get('/', [CreateController::class, 'name'])->name('task.create.name');
        Route::post('/name', [CreateController::class, 'name_store'])->name('task.create.name.store');
        Route::get('/custom/{task}', [CreateController::class, 'custom_get'])->name('task.create.custom.get');
        Route::post('/custom/{task}/store', [CreateController::class, 'custom_store'])->name('task.create.custom.store');
        Route::get('/address/{task}', [CreateController::class, 'address'])->name('task.create.address');
        Route::post('/address/{task}/store', [CreateController::class, 'address_store'])->name('task.create.address.store');
        Route::get('/date/{task}', [CreateController::class, 'date'])->name('task.create.date');
        Route::post('/date/{task}/store', [CreateController::class, 'date_store'])->name('task.create.date.store');
        Route::get('/budget/{task}', [CreateController::class, 'budget'])->name('task.create.budget');
        Route::post('/budget/{task}/store', [CreateController::class, 'budget_store'])->name('task.create.budget.store');
        Route::get('/note/{task}', [CreateController::class, 'note'])->name('task.create.note');
        Route::post('/note/{task}/store', [CreateController::class, 'note_store'])->name('task.create.note.store');
        Route::post('/note/{task}/images/store', [CreateController::class, 'images_store'])->name('task.create.images.store');
        Route::get('/contact/{task}', [CreateController::class, 'contact'])->name('task.create.contact');
        Route::post('/contact/{task}/store', [CreateController::class, 'contact_store'])->name('task.create.contact.store.phone')->middleware('auth');
        Route::post('/contact/{task}/store/register', [CreateController::class, 'contact_register'])->name('task.create.contact.store.register')->middleware('guest');
        Route::post('/contact/{task}/store/login/', [CreateController::class, 'contact_login'])->name('task.create.contact.store.login')->middleware('guest');
        Route::get('/verify/{task}/{user}', [CreateController::class, 'verify'])->name('task.create.verify');
        Route::post('/verify/{user}', [UserController::class, 'verifyProfil'])->name('task.create.verification');
        Route::post('/upload', [CreateController::class, 'uploadImage']);
        Route::get('task/{task}/images/delete', [CreateController::class, 'deleteAllImages'])->name('task.images.delete')->middleware('auth');


        // Responses

        Route::post("/detailed-task/{task}/response", [ResponseController::class, 'store'])->name('task.response.store'); // javoxir


    });

});

Route::get('/performers-by-category', [PerformerAPIController::class, 'getByCategories']);
Route::post('/reset', [UserController::class, 'reset_submit'])->name('password.reset');
Route::get('/reset/password', [UserController::class, 'reset_password'])->name('password.reset.password');
Route::post('/reset/password', [UserController::class, 'reset_password_save'])->name('password.reset.password.save');
Route::get('/code', [UserController::class, 'reset_code_view'])->name('password.reset.code.view');
Route::post('/code', [UserController::class, 'reset_code'])->name('password.reset.code');

Route::get('/register/code', [UserController::class, 'code'])->name('register.code');
Route::post('/register/code', [UserController::class, 'code_submit'])->name('register.code.submit');
Route::post('/account/password/change', [ProfileController::class, 'change_password'])->name('account.password.reset');


Route::post('select-performer/{response}', [ResponseController::class, 'selectPerformer'])->name('performer.select'); // javoxir
Route::post('tasks/{task}/complete', [UpdateController::class, 'completed'])->name('task.completed'); // javoxir
Route::post('send-review-user/{task}', [UpdateController::class, 'sendReview'])->name('send.review'); // javoxir


Route::get('/faq', [FaqsController::class, 'index'])->name('faq.index'); // javoxir
Route::get('/questions/{id}', [FaqsController::class, 'questions'])->name('questions'); // javoxir


Route::get('/categories/{id}', [Controller::class, 'category'])->name("categories"); // javoxir
Route::get('/lang/{lang}', [Controller::class, 'lang'])->name('lang'); // javoxir


Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'loginPost'])->name('signin.custom')->middleware('guest');


Route::get('/register', [UserController::class, 'signup'])->name('register')->middleware('guest');
Route::post('/register', [LoginController::class, 'customRegister'])->name('user.registration')->middleware('guest');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/reset', [UserController::class, 'reset'])->name('reset');

Route::get('/confirm', [UserController::class, 'confirm'])->name('confirm');

//Route::get('dashboard', [UserController::class, 'dashboardView'])->middleware(['auth', 'is_verify_email']);


Route::get('dashboard', [UserController::class, 'dashboardView'])->middleware(['auth']);
Route::get('account/verify/{user}/{hash}', [LoginController::class, 'verifyAccount'])->name('user.verify');
Route::get('account/verification/email', [LoginController::class, 'send_email_verification'])->name('user.verify.send')->middleware('auth');
Route::get('account/verification/phone', [LoginController::class, 'send_phone_verification'])->name('user.verify.phone.send')->middleware('auth');
Route::post('account/verification/phone', [LoginController::class, 'verify_phone'])->name('user.verify.phone.submit')->middleware('auth');
Route::post("account/change/email", [LoginController::class, 'change_email'])->name('user.email.change')->middleware('auth');
Route::post("account/change/phone", [LoginController::class, 'change_phone_number'])->name('user.phone.change')->middleware('auth');
Route::post("account/change/phone/send", [LoginController::class, 'verify_phone'])->name('user.phone.verify')->middleware('auth');



