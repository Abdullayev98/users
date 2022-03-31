<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VoyagerUserAPIController extends Controller
{
    public function activity(User $user) {
        if (!auth()->user()->hasPermission("change_activeness")) {
            return response()->json([
                'message' => "Sizga ruxsat etilmagan!",
            ]);
        }
        $user->is_active = $user->is_active?0:1;
        $user->save();
        return response()->json([
            'message' => "Muvafaqiyatli o'zgartirildi!"
        ]);
    }
}
