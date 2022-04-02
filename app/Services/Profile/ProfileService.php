<?php

namespace App\Services\Profile;

use Illuminate\Support\Facades\Auth;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



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

public function testBaseServ($request){
    $user = Auth::user();
    $comment = $user->portfolios()->orderBy('created_at', 'desc')->first();
    $image = File::allFiles("Portfolio/{$user->name}/{$comment->comment}");
    $json = implode(',', $image);
    $data['image'] = $json;
    $id = $comment->id;
    $base = new Portfolio();
    if ($base->where('id', $id)->update($data)) {
        return redirect("/profile");
    } else {
        return dd(false);
    }
}

}
