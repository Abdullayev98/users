<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;


Route::get('/categories/{id}', [Controller::class, 'category'])->name("categories");
