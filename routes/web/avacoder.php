<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Task\CreateTastController;
use Illuminate\Support\Facades\Route;



Route::get('/home/profile', [Controller::class, 'home_profile'])->name('home.profile');
Route::get('/task/create', [CreateTastController::class, 'task_create'])->name('task.create');
Route::get('/task/search', [Controller::class, 'task_search'])->name('task.search');
