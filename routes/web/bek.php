<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;



Route::get('/profile', [Controller::class, 'home_profile'])->name('home.profile');
Route::get('/task/create', [Controller::class, 'task_create'])->name('task.create');
Route::get('/task/search', [Controller::class, 'task_search'])->name('task.search');
Route::get('profile/cash', [Controller::class, 'profile_cash'])->name('profile.cash');
