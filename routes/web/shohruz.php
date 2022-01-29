<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqsController;

Route::get('/faq',[FaqsController::class, 'index'])->name('faq.index');
Route::get('/questions/{id}', [FaqsController::class,'questions'])->name('questions');

?>
