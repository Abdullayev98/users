<?php

use App\Http\Controllers\API\PerformerAPIController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Task\CreateController;
use App\Http\Controllers\Task\CreateTaskController;
use App\Http\Controllers\Task\ResponseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'auth'], function (){
    Route::get('/home/profile', [Controller::class, 'home_profile'])->name('home.profile');
});

Route::prefix("task")->group(function (){
    Route::prefix("create")->group(function (){
        Route::get('/', [CreateController::class, 'name'])->name('task.create.name');
        Route::post('/name', [CreateController::class, 'name_store'])->name('task.create.name.store');
        Route::get('/custom/{task}', [CreateController::class, 'custom_get'])->name('task.create.custom.get');
        Route::post('/custom/{task}/store', [CreateController::class, 'custom_store'])->name('task.create.custom.store');
        Route::get('/address/{task}', [CreateController::class, 'address'])->name('task.create.address');
        Route::post('/address/{task}/store', [CreateController::class, 'address_store'])->name('task.create.address.store');
        Route::get('/date/{task}', [CreateController::class, 'date'])->name('task.create.date');
        Route::post('/date/{task}/store', [CreateController::class, 'date_store'])->name('task.create.date.store');
        Route::get('/budget/{task}', [CreateController::class, 'budget'])->name('task.create.budget');
        Route::post('/budget/{task}/store', [CreateController::class, 'budget_store'])->name('task.create.budget.store');
        Route::get('/note/{task}', [CreateController::class, 'note'])->name('task.create.note');
        Route::post('/note/{task}/store', [CreateController::class, 'note_store'])->name('task.create.note.store');
        Route::get('/contact/{task}', [CreateController::class, 'contact'])->name('task.create.contact');
        Route::post('/contact/{task}/store', [CreateController::class, 'contact_store'])->name('task.create.contact.store');
        Route::get('/verify/{task}', [CreateController::class, 'verify'])->name('task.create.verify');
        Route::post('/verify', [UserController::class, 'verifyProfil'])->name('task.create.verification')->middleware('auth');
        Route::post('/upload', [CreateController::class, 'uploadImage']);




        // Responses

        Route::post("/detailed-task/{task}/response", [ResponseController::class,'store'])->name('task.response.store');






        /*
        Route::get('/', [CreateController::class, 'name'])->name('task.create.name');/*
        Route::post('/location', [CreateTaskController::class, 'location'])->name('task.create.location');
        Route::post('/delivery', [CreateTaskController::class, 'delivery'])->name('task.create.delivery');
        Route::post('/buy_delivery', [CreateTaskController::class, 'buy_delivery'])->name('task.create.buy_delivery');
        Route::post('/service_delivery', [CreateTaskController::class, 'service_delivery'])->name('task.create.service_delivery');
        Route::post('/avto_delivery', [CreateTaskController::class, 'avto_delivery'])->name('task.create.avto_delivery');
        Route::post('/car', [CreateTaskController::class, 'remont_car'])->name('task.create.remont_car');
        Route::post('/info', [CreateTaskController::class, 'info_car'])->name('task.create.info_car');
        Route::post('/carservice', [CreateTaskController::class, 'car_service'])->name('task.create.car_service');
        Route::post('/construction', [CreateTaskController::class, 'construction'])->name('task.create.construction');
        Route::post('/', [CreateTaskController::class, 'task_add'])->name('task.create.name');
        Route::post('/cargo', [CreateTaskController::class, 'cargo'])->name('task.create.cargo');
        Route::post('/people', [CreateTaskController::class, 'people'])->name('task.create.people');
        Route::post('/movers', [CreateTaskController::class, 'movers'])->name('task.create.movers');
        Route::post('/peoplefortransported', [CreateTaskController::class, 'peopleTransported'])->name('task.create.peopleTransported');
        Route::post('/housemaid', [CreateTaskController::class, 'housemaid'])->name('task.create.housemaid');
        Route::post('/housemaid1', [CreateTaskController::class, 'housemaid1'])->name('task.create.housemaid1');
        Route::post('/glass', [CreateTaskController::class, 'glass'])->name('task.create.glass');
        Route::post('/address', [CreateTaskController::class, 'location_create'])->name('task.create.address');
        Route::post('/custom', [CreateTaskController::class, 'custom'])->name('task.create.custom');
        Route::post('/smm', [CreateTaskController::class, 'smm'])->name('task.create.smm');
        Route::post('/computer', [CreateTaskController::class, 'computer'])->name('task.create.computer');
        Route::post('/design', [CreateTaskController::class, 'design'])->name('task.create.design');
        Route::post('/it', [CreateTaskController::class, 'it'])->name('task.create.it');//it emas Ay Ti
        Route::post('/photo', [CreateTaskController::class, 'photo'])->name('task.create.photo');
        Route::post('/remont_ustanovka', [CreateTaskController::class, 'remont_ustanovka'])->name('task.create.remont_ustanovka');
        Route::post('/remont_tex', [CreateTaskController::class, 'remont_tex'])->name('task.create.remont_tex');
        Route::post('/bugalter', [CreateTaskController::class, 'bugalter'])->name('task.create.bugalter');
        Route::post('/learning', [CreateTaskController::class, 'learning'])->name('task.create.learning');
        Route::post('/age', [CreateTaskController::class, 'age'])->name('task.create.age');
        Route::post('/training', [CreateTaskController::class, 'training'])->name('task.create.training');
        Route::post('/krosata', [CreateTaskController::class, 'krosata'])->name('task.create.krosata');
        Route::post('/date', [CreateTaskController::class, 'date'])->name('task.create.date');
        Route::post('/budget', [CreateTaskController::class, 'budget'])->name('task.create.budget');
        Route::get('/service', [CreateTaskController::class, 'service'])->name('task.create.service');
        Route::post('/services', [CreateTaskController::class, 'services'])->name('task.create.services');
        Route::get('/note', [CreateTaskController::class, 'note'])->name('task.create.note');
        Route::post('/notes', [CreateTaskController::class, 'notes'])->name('task.create.notes');
        Route::post('/contacts', [CreateTaskController::class, 'contacts'])->name('task.create.contacts');
        Route::post('/done', [CreateTaskController::class, 'create'])->name('task.create');*/
        // Route::post('/create',[CreateTaskController::class 'create'])->name('task.create');


    });
    Route::delete("{task}/delete", [CreateTaskController::class, 'delete'])->name("task.delete");

});

Route::get('/performers-by-category', [PerformerAPIController::class,'getByCategories']);
Route::post('/reset', [UserController::class,'reset_submit'])->name('password.reset');
Route::get('/reset/password', [UserController::class,'reset_password'])->name('password.reset.password');
Route::post('/reset/password', [UserController::class,'reset_password_save'])->name('password.reset.password.save');
Route::get('/code', [UserController::class,'reset_code_view'])->name('password.reset.code.view');
Route::post('/code', [UserController::class,'reset_code'])->name('password.reset.code');

Route::get('/register/code', [UserController::class,'code'])->name('register.code');
Route::post('/register/code', [UserController::class,'code_submit'])->name('register.code');






