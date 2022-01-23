<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;




//Profile

Route::group(['middleware'=>'auth'], function (){
    Route::get('/profile', [ProfileController::class, 'profileData'])->name('userprofile');
});
Route::post('/updateuserphoto', [ProfileController::class, 'updates'])->name('updatephoto');

//Profile cash
Route::get('/profile/cash', [ProfileController::class, 'profileCash'])->name('userprofilecash');
Route::post('/updateuserphoto', [ProfileController::class, 'updateCash'])->name('updatephotocash');

// Profile settings
Route::get('/profile/settings', [ProfileController::class, 'editData'])->name('editData');
Route::post('/profile/settings/update', [ProfileController::class, 'updateData'])->name('updateData');
Route::post('/profile/updatephoto', [ProfileController::class, 'imageUpdate'])->name('updateSettingPhoto');

// Profile delete
Route::get('/profile/delete', [ProfileController::class, 'destroy'])->name('users.delete');

//added category id
Route::post('/profile/getcategory',[ProfileController::class, 'getCategory'])->name('get.category');

Route::post('/profile/insertdistrict',[ProfileController::class, 'StoreDistrict'])->name('insert.district');

Route::post('/profile/storepicture',[ProfileController::class, 'StorePicture'])->name('storePicture');

//description
Route::post('/profile/description',[ProfileController::class, 'EditDescription'])->name('edit.description');

