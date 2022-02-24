<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserView;
use App\Services\Payme\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class PerformerAPIController extends Controller
{
    public function service()
    {

        return User::where('role_id', 2)->paginate(50);
    }

    public function performer(User $performer)
    {
        setView($performer);

        return $performer->role_id == 5? $performer:abort(404);
    }


    public function getByCategories()
    {


        return response()->json(['id' => request()->category_id]);
    }
}
