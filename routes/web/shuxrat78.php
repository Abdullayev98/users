<?php
use App\Http\Controllers\Task\SearchTaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('task-search', [SearchTaskController::class, 'task_search'])->name('task.search');
Route::get('tasks-search', [SearchTaskController::class, 'ajax_tasks'])->name('tasks.search');
Route::get('my-tasks', [SearchTaskController::class, 'my_tasks'])->name('task.mytasks');
Route::get('search', [SearchTaskController::class, 'search'])->name('search');
