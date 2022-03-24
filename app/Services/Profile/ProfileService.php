<?php

namespace App\Services\Profile;

use Illuminate\Support\Facades\Auth;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;


class ProfileService
{
public function commentServ($request){
    $user = Auth::user();
    $comment = $request->input('comment');
    $description = $request->input('description');
    $data['user_id'] = $user->id;
    $data['comment'] = $comment;
    $data['description'] = $description;
    $dd = Portfolio::create($data);
    return $dd;
}

public function uploadImageServ($request){
    $imgData = session()->has('images') ? json_decode(session('images')):[];
    $files = $request->file('files');
    if ($request->hasFile('files')) {
        foreach ($files as $file) {
            $name = Storage::put('public/uploads', $file);
            $name = str_replace('public/', '', $name);
            array_push($imgData,$name);
        }
    }
    session()->put('images', json_encode($imgData));
}

}
