<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::group(['middleware'=>'auth'], function (){
    Route::prefix('profile')->group(function () {
        //Profile
        Route::get('/', [ProfileController::class, 'profileData'])->name('userprofile');
        Route::put('/updateuserphoto', [ProfileController::class, 'updates'])->name('update.photo');

        //Profile cash
        Route::get('/cash', [ProfileController::class, 'profileCash'])->name('userprofilecash');

        // Profile settings
        Route::get('/settings', [ProfileController::class, 'editData'])->name('editData');
        Route::post('/settings/update', [ProfileController::class, 'updateData'])->name('updateData');

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

        //create_port
        Route::get('/create', function () {
            return view('profile/create_port');
        });
        Route::get('/portfolio/{id}', [ProfileController::class, 'portfolio'])->name('portfolio');
        Route::post('/delete/portfolio/{id}', [ProfileController::class, 'delete'])->name('portfolio.delete');
    });
});

Route::post('/portfolio/create', [ProfileController::class, 'createPortfolio'])->name('portfolio.create')->middleware('auth');



