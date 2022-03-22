<?php

namespace App\Services\User;

use Carbon\Carbon;

class Active
{


    public static function setActive($user)
    {
        $user->last_seen_at = Carbon::now()->addMinutes(2);
        $user->save();
    }


}
