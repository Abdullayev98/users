<?php

use App\Http\Controllers\API\CategoriesAPIController; // javoxir
use App\Http\Controllers\API\CustomFieldAPIController; // javoxir
use App\Http\Controllers\API\FaqAPIController; // javoxir
use App\Http\Controllers\API\LoginAPIController;
use App\Http\Controllers\API\NewsAPIController;
use App\Http\Controllers\API\PerformerAPIController; // javoxir
use App\Http\Controllers\API\ProfileAPIController; // javoxir +
use App\Http\Controllers\API\SocialAPIController;
use App\Http\Controllers\API\TaskAPIController; // javoxir
use App\Http\Controllers\API\UserAPIController; // javoxir
use App\Http\Controllers\API\SearchAPIController; // javoxir -
use App\Http\Controllers\API\MassmediaAPIController; // javoxir
use App\Http\Controllers\API\ConversationAPIController;
use App\Http\Controllers\API\VoyagerUserAPIController; // javoxir -
use App\Http\Controllers\API\RefillAPIController; // javoxir
use App\Http\Controllers\API\ReportAPIController; // javoxir
use App\Http\Controllers\API\PaynetTransactionAPIController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('custom.auth:api')->group(function () {
    Route::post('logout', [UserAPIController::class, 'logout']); //end

    Route::post('task/create', [TaskAPIController::class, 'create']); //end

//    Route::any('/{paysys}',function($paysys){
//        (new Goodoneuz\PayUz\PayUz)->driver($paysys)->handle();
//    });

    Route::get('/my-tasks', [TaskAPIController::class, 'my_tasks']); //end
    Route::put('/change-task/{task}', [TaskAPIController::class, 'changeTask']); //end
    Route::get('/custom-field-by-category/{category}',[CustomFieldAPIController::class,'getByCategoryId']); //end
    Route::get('/custom-field-values-by-task/{task}',[CustomFieldAPIController::class,'getByTaskId']); //end
    Route::get('/custom-field-values-by-custom-field/{custom_field}',[CustomFieldAPIController::class,'getByCustomFieldId']); //end
    Route::delete('/for_del_new_task/{task}', [TaskAPIController::class, 'deletetask']); //end
    Route::delete('/delete-task/{task}', [SearchAPIController::class, 'delete_task']); //end
    Route::delete('/delete', [UserAPIController::class, 'destroy']); //end
    Route::post('/settings/update', [ProfileAPIController::class, 'updateData'])->name('profile.updateData'); //not



    Route::get('account/verification/email', [LoginAPIController::class, 'send_email_verification']);
    Route::get('account/verification/phone', [LoginAPIController::class, 'send_phone_verification']);
    Route::post('account/verification/phone', [LoginAPIController::class, 'verify_phone']);
    Route::post("account/change/email", [LoginAPIController::class,'change_email']);
    Route::post("account/change/phone", [LoginAPIController::class,'change_phone_number']);


});

//User Routes
Route::post('login', [UserAPIController::class, 'login']); //end
Route::post('register', [UserAPIController::class, 'register']); //end

Route::post('/reset', [UserAPIController::class, 'reset_submit']);
Route::post('/reset/password', [UserAPIController::class, 'reset_password_save'])->name('user.reset_password_save');
Route::post('/code', [UserAPIController::class, 'reset_code'])->name('user.reset_code');




// FAQ
Route::get('faq', [FaqAPIController::class, 'index']); //end
Route::get('faq/{id}', [FaqAPIController::class, 'questions']); //end

//Tasks
Route::get('task/{task}', [TaskAPIController::class, 'task']); //end
Route::get('tasks-search', [SearchAPIController::class, 'ajax_tasks']); //end
Route::get('search-task', [SearchAPIController::class, 'task_search']); //end
Route::post('ajax-request', [SearchAPIController::class, 'task_response']); //not
Route::get('/detailed-tasks/{task}', [SearchAPIController::class, 'task']); //end

//Categories
Route::get('/categories', [CategoriesAPIController::class, 'index']); //end
Route::get('/categories/{id}', [CategoriesAPIController::class, 'show']); //end

//Performers
Route::get('/performers', [PerformerAPIController::class, 'service']); //end
Route::get('/performers/{performer}', [PerformerAPIController::class, 'performer']); //end

//Massmedia
Route::get('/press',[MassmediaAPIController::class, 'index']); //end

//Conversation
Route::group(['prefix' => 'admin'], function () {
    // Admin Kerakmas, Kompda kirishadi
    Route::get('/messages/chat/{id}', [ConversationAPIController::class, 'showChat']);
    Route::post('/messages/chat/rate/{message}', [ConversationAPIController::class, 'rating']);
    Route::post('/messages/chat/close/{message}', [ConversationAPIController::class, 'close']);
    Route::post('/messages/chat/{id}', [ConversationAPIController::class, 'send']);
    Route::get("users/activitiy/{user}", [VoyagerUserAPIController::class, "activity"]); // so`rash kerak
    Route::get('/reports', [ReportAPIController::class, 'index']); //end
});

//Refill
Route::get('/ref', [RefillAPIController::class, 'ref']); //end
Route::post('/prepare', [RefillAPIController::class, 'prepare']); //end
Route::post('/complete', [RefillAPIController::class, 'complete']); //end
Route::post('/paynet-transaction', [PaynetTransactionAPIController::class, 'create'])->name('paynet-transaction');



Route::get('login/google/callback',[SocialAPIController::class,'loginWithGoogle']);

Route::get('login/facebook/callback',[SocialAPIController::class,'loginWithFacebook']);
