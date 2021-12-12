<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Task\CreateTastController;
use Illuminate\Support\Facades\Route;



Route::get('/home/profile', [Controller::class, 'home_profile'])->name('home.profile');

Route::prefix("task")->group(function (){

    Route::prefix("create")->group(function (){
        Route::get('/', [CreateTastController::class, 'task_create'])->name('task.create.name');
        Route::get('/address', [CreateTastController::class, 'location_create'])->name('task.create.address');
        Route::get('/custom', [CreateTastController::class, 'custom'])->name('task.create.custom');
        Route::get('/date', [CreateTastController::class, 'date'])->name('task.create.date');
        Route::get('/budget', [CreateTastController::class, 'budget'])->name('task.create.budget');
        Route::get('/notes', [CreateTastController::class, 'notes'])->name('task.create.notes');
        Route::get('/contacts', [CreateTastController::class, 'contacts'])->name('task.create.contacts');
    });
});
