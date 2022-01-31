<?php

use App\Http\Controllers\API\PerformerAPIController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Task\CreateController;
use App\Http\Controllers\Task\CreateTaskController;
use App\Http\Controllers\Task\ResponseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'auth'], function (){
    Route::get('/home/profile', [Controller::class, 'home_profile'])->name('home.profile');
});

Route::prefix("task")->group(function (){
    Route::prefix("create")->group(function (){
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
        Route::get('/contact/{task}', [CreateController::class, 'contact'])->name('task.create.contact');
        Route::post('/contact/{task}/store', [CreateController::class, 'contact_store'])->name('task.create.contact.store.phone')->middleware('auth');
        Route::post('/contact/{task}/store/register', [CreateController::class, 'contact_register'])->name('task.create.contact.store.register')->middleware('guest');
        Route::post('/contact/{task}/store/login', [CreateController::class, 'contact_login'])->name('task.create.contact.store.login')->middleware('guest');
        Route::get('/verify/{task}', [CreateController::class, 'verify'])->name('task.create.verify');
        Route::post('/verify', [UserController::class, 'verifyProfil'])->name('task.create.verification')->middleware('auth');
        Route::post('/upload', [CreateController::class, 'uploadImage']);




        // Responses

        Route::post("/detailed-task/{task}/response", [ResponseController::class,'store'])->name('task.response.store');


    });
    Route::delete("{task}/delete", [CreateTaskController::class, 'delete'])->name("task.delete");

});

Route::get('/performers-by-category', [PerformerAPIController::class,'getByCategories']);
Route::post('/reset', [UserController::class,'reset_submit'])->name('password.reset');
Route::get('/reset/password', [UserController::class,'reset_password'])->name('password.reset.password');
Route::post('/reset/password', [UserController::class,'reset_password_save'])->name('password.reset.password.save');
Route::get('/code', [UserController::class,'reset_code_view'])->name('password.reset.code.view');
Route::post('/code', [UserController::class,'reset_code'])->name('password.reset.code');

Route::get('/register/code', [UserController::class,'code'])->name('register.code');
Route::post('/register/code', [UserController::class,'code_submit'])->name('register.code');
Route::post('/account/password/change', [ProfileController::class,'change_password'])->name('account.password.reset');






