<?php

namespace App\Services\Profile;

use Illuminate\Support\Facades\Auth;
use App\Models\Portfolio;


class ProfileService
{
public function profServ($request){
    $user = Auth::user();
    $comment = $request->input('comment');
    $description = $request->input('description');
    $data['user_id'] = $user->id;
    $data['comment'] = $comment;
    $data['description'] = $description;
    $dd = Portfolio::create($data);
    return $dd;
}

}
