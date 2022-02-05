<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::group(['middleware'=>'auth'], function (){
    Route::prefix('profile')->group(function () {
        //Profile
        Route::get('/', [ProfileController::class, 'profileData'])->name('userprofile');
        Route::post('/updateuserphoto', [ProfileController::class, 'updates'])->name('updatephoto');

        //Profile cash
        Route::get('/cash', [ProfileController::class, 'profileCash'])->name('userprofilecash');
        Route::post('/updateuserphoto', [ProfileController::class, 'updateCash'])->name('updatephotocash');

        // Profile settings
        Route::get('/settings', [ProfileController::class, 'editData'])->name('editData');
        Route::post('/settings/update', [ProfileController::class, 'updateData'])->name('updateData');
        Route::post('/updatephoto', [ProfileController::class, 'imageUpdate'])->name('updateSettingPhoto')->middleware('auth');

        // Profile delete
        Route::get('/delete/{id}', [ProfileController::class, 'destroy'])->name('users.delete');

        //added category id
        Route::post('/getcategory',[ProfileController::class, 'getCategory'])->name('get.category');

        Route::post('/insertdistrict',[ProfileController::class, 'StoreDistrict'])->name('insert.district');

        Route::post('/storepicture',[ProfileController::class, 'UploadImage'])->name('storePicture');
        Route::post('/comment',[ProfileController::class, 'comment'])->name('comment');
        Route::post('/testBase',[ProfileController::class, 'testBase'])->name('testBase');

        //description
        Route::post('/description',[ProfileController::class, 'EditDescription'])->name('edit.description');
    });
});



