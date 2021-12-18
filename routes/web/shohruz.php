<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqsController;

Route::get('/faq',[FaqsController::class, 'index']);
Route::get('/questions', [FaqsController::class,'questions'])->name('questions');

?>