<?php

use App\Http\Controllers\API\CategoriesAPIController; // javoxir
use App\Http\Controllers\API\CustomFieldAPIController; // javoxir
use App\Http\Controllers\API\FaqAPIController; // javoxir
use App\Http\Controllers\API\NewsAPIController;
use App\Http\Controllers\API\PerformerAPIController; // javoxir
use App\Http\Controllers\API\ProfileAPIController; // javoxir
use App\Http\Controllers\API\TaskAPIController; // javoxir
use App\Http\Controllers\API\UserAPIController; // javoxir
use App\Http\Controllers\API\SearchAPIController; // javoxir --
use App\Http\Controllers\API\MassmediaAPIController; // javoxir
use App\Http\Controllers\API\ConversationAPIController;
use App\Http\Controllers\API\VoyagerUserAPIController; // javoxir -
use App\Http\Controllers\API\RefillAPIController; // javoxir
use App\Http\Controllers\API\ReportAPIController; // javoxir
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

/* Route::any('/{paysys}',function($paysys){
    (new Goodoneuz\PayUz\PayUz)->driver($paysys)->handle();
});
Route::any('/pay/{paysys}/{key}/{amount}',function($paysys, $key, $amount){
    $model = Goodoneuz\PayUz\Services\PaymentService::convertKeyToModel($key);
    $url = request('redirect_url','/'); // redirect url after payment completed
    $pay_uz = new Goodoneuz\PayUz\PayUz;
    $pay_uz
        ->driver($paysys)
        ->redirect($model, $amount, 860, $url);
}); */

Route::middleware('custom.auth:api')->group(function () {
    Route::post('logout', [UserAPIController::class, 'logout']); //end

    Route::post('task/create', [TaskAPIController::class, 'create']); //end
    Route::get('settings', [ProfileAPIController::class, 'settings']); //end


    Route::get('/my-tasks', [TaskAPIController::class, 'my_tasks']); //end
    Route::put('/change-task/{task}', [TaskAPIController::class, 'changeTask']);
    Route::get('/custom-field-by-category/{category}',[CustomFieldAPIController::class,'getByCategoryId']); //end
    Route::get('/custom-field-values-by-task/{task}',[CustomFieldAPIController::class,'getByTaskId']); //end
    Route::get('/custom-field-values-by-custom-field/{custom_field}',[CustomFieldAPIController::class,'getByCustomFieldId']); //end
    Route::delete('/for_del_new_task/{task}', [TaskAPIController::class, 'deletetask']); //end
    Route::delete('/delete-task/{task}', [SearchAPIController::class, 'delete_task']); //not
    Route::delete('/delete', [UserAPIController::class, 'destroy']); //end

});

//User Routes
Route::post('login', [UserAPIController::class, 'login']); //end
Route::post('register', [UserAPIController::class, 'register']); //end
Route::put('update/{id}', [UserAPIController::class, 'update']); //end

// FAQ
Route::get('faq', [FaqAPIController::class, 'index']); //end
Route::get('faq/{id}', [FaqAPIController::class, 'questions']); //end



//Tasks
Route::get('task/{task}', [TaskAPIController::class, 'task']); //end
Route::get('find', [TaskAPIController::class, 'search']); //end
Route::get('tasks-search', [SearchAPIController::class, 'ajax_tasks'])->name('tasks.search');; //end
Route::get('search-task', [SearchAPIController::class, 'task_search']); //end
Route::post('ajax-request', [SearchAPIController::class, 'task_response']); //not
Route::get('/detailed-tasks/{task}', [SearchAPIController::class, 'task']); //end

Route::get('tasks-search', [SearchAPIController::class, 'ajax_tasks']); //end
Route::get('search-task', [SearchAPIController::class, 'task_search']); //end
Route::delete('delete-task/{task}', [SearchAPIController::class, 'delete_task']); //not
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

