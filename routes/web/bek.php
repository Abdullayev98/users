<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Task\CreateTaskController;
use App\Http\Controllers\Task\CreateTastController;
use Illuminate\Support\Facades\Route;



Route::get('/home/profile', [Controller::class, 'home_profile'])->name('home.profile');

Route::prefix("profile")->group(function(){
    Route::get('/', [Controller::class, 'home_profile'])->name('home.profile');
    Route::get('/settings', [Controller::class, 'profile_settings'])->name('profile.settings');
    Route::get('/cash', [Controller::class, 'profile_cash'])->name('profile.cash');
    Route::get('/login', [Controller::class, 'profile_login'])->name('profile.login');
});

Route::get('/geotaskshint', [Controller::class, 'geotaskshint'])->name('geotaskshint');
Route::get('/security', [Controller::class, 'security'])->name('security');

Route::prefix("task")->group(function (){

    Route::prefix("create")->group(function (){
        Route::get('/', [CreateTaskController::class, 'task_create'])->name('task.create.name');
        Route::get('/address', [CreateTaskController::class, 'location_create'])->name('task.create.address');
        Route::get('/custom', [CreateTaskController::class, 'custom'])->name('task.create.custom');
        Route::get('/date', [CreateTaskController::class, 'date'])->name('task.create.date');
        Route::get('/budget', [CreateTaskController::class, 'budget'])->name('task.create.budget');
        Route::get('/notes', [CreateTaskController::class, 'notes'])->name('task.create.notes');
        Route::get('/contacts', [CreateTaskController::class, 'contacts'])->name('task.create.contacts');
    });
});
