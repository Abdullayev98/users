<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Task\CreateTaskController;
use Illuminate\Support\Facades\Route;



Route::get('/home/profile', [Controller::class, 'home_profile'])->name('home.profile');

Route::prefix("task")->group(function (){

    Route::prefix("create")->group(function (){
        Route::get('/', [CreateTaskController::class, 'task_create'])->name('task.create.name');
        Route::post('/location', [CreateTaskController::class, 'location'])->name('task.create.location');
        Route::post('/', [CreateTaskController::class, 'task_add'])->name('task.create.name');
        Route::post('/cargo', [CreateTaskController::class, 'cargo'])->name('task.create.cargo');
        Route::post('/people', [CreateTaskController::class, 'people'])->name('task.create.people');
        Route::post('/movers', [CreateTaskController::class, 'movers'])->name('task.create.movers');
        Route::post('/peoplefortransported', [CreateTaskController::class, 'peopleTransported'])->name('task.create.peopleTransported');
        Route::post('/housemaid', [CreateTaskController::class, 'housemaid'])->name('task.create.housemaid');
        Route::post('/housemaid1', [CreateTaskController::class, 'housemaid1'])->name('task.create.housemaid1');
        Route::post('/glass', [CreateTaskController::class, 'glass'])->name('task.create.glass');
        Route::post('/address', [CreateTaskController::class, 'location_create'])->name('task.create.address');
        Route::post('/custom', [CreateTaskController::class, 'custom'])->name('task.create.custom');
        Route::post('/smm', [CreateTaskController::class, 'smm'])->name('task.create.smm');
        Route::post('/computer', [CreateTaskController::class, 'computer'])->name('task.create.computer');
        Route::post('/date', [CreateTaskController::class, 'date'])->name('task.create.date');
        Route::post('/budget', [CreateTaskController::class, 'budget'])->name('task.create.budget');
        Route::get('/service', [CreateTaskController::class, 'service'])->name('task.create.service');
        Route::post('/services', [CreateTaskController::class, 'services'])->name('task.create.services');
        Route::get('/note', [CreateTaskController::class, 'note'])->name('task.create.note');
        Route::post('/notes', [CreateTaskController::class, 'notes'])->name('task.create.notes');
        Route::post('/contacts', [CreateTaskController::class, 'contacts'])->name('task.create.contacts');
        Route::get('/done', [CreateTaskController::class, 'create'])->name('task.create');
        // Route::post('/create',[CreateTaskController::class 'create'])->name('task.create');

    });
    Route::delete("{task}/delete", [CreateTaskController::class, 'delete'])->name("task.delete");

});
