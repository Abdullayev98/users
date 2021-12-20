<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Task\CreateTaskController;
use Illuminate\Support\Facades\Route;




Route::prefix("task")->group(function (){

    Route::prefix("create")->group(function (){
        Route::get('/', [CreateTaskController::class, 'task_create'])->name('task.create.name');
        Route::post('/', [CreateTaskController::class, 'task_add'])->name('task.create.name');
        Route::get('/address', [CreateTaskController::class, 'location_create'])->name('task.create.address');
        Route::get('/custom', [CreateTaskController::class, 'custom'])->name('task.create.custom');
        Route::get('/date', [CreateTaskController::class, 'date'])->name('task.create.date');
        Route::get('/budget', [CreateTaskController::class, 'budget'])->name('task.create.budget');
        Route::get('/notes', [CreateTaskController::class, 'notes'])->name('task.create.notes');
        Route::get('/contacts', [CreateTaskController::class, 'contacts'])->name('task.create.contacts');



    });
    Route::delete("{task}/delete", [CreateTaskController::class, 'delete'])->name("task.delete");

});
