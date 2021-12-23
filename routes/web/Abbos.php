<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;




//Profile
Route::get('/profile', [ProfileController::class, 'profileData'])->name('userprofile');
Route::post('/updateuserphoto/{id}', [ProfileController::class, 'update'])->name('updatephoto');

// Profile settings
Route::get('/profile/settings', [ProfileController::class, 'editData'])->name('editData');
Route::post('/profile/settings/update', [ProfileController::class, 'updateData'])->name('updateData');
Route::post('/updatephoto/{id}', [ProfileController::class, 'imageUpdate'])->name('updateSettingPhoto');

// Profile delete
Route::get('/profile/delete', [ProfileController::class, 'destroy'])->name('users.delete');

//added category id
Route::post('/profile/getcategory',[ProfileController::class, 'getCategory'])->name('get.category');
