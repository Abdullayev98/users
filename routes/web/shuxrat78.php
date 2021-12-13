<?php
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/task-search', [Controller::class, 'task_search'])->name('task.search');
