<?php
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/task/location', [Controller::class, 'location_create'])->name('task.location');