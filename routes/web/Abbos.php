<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;




//Profile
Route::get('/profile1', [ProfileController::class, 'profileData'])->name('userprofile');

Route::post('/updateuserphoto/{id}', [ProfileController::class, 'update'])->name('updatephoto');
