<?php
use App\Http\Controllers\Task\SearchTaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('tasks-all', [SearchTaskController::class, 'tasksAll'])->name('tasks_all');
Route::get('my-tasks', [SearchTaskController::class, 'myTasks'])->name('my_tasks');
Route::get('task-search', [SearchTaskController::class, 'taskSearch'])->name('task_search');
