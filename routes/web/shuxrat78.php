<?php
use App\Http\Controllers\Task\SearchTaskController;
use Illuminate\Support\Facades\Route;

Route::get('task-search', [SearchTaskController::class, 'task_search'])->name('task.search');
Route::get('my-tasks', [SearchTaskController::class, 'my_tasks'])->name('task.mytasks');
