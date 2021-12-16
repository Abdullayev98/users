<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function profileData()
    {
        // $email = 'admin@admin.com';
        // $user = User::whereEmail($email)->first();
        $user = User::find(1);
        return view('profile.profile', compact('user'));
    }
    public function updatephoto($id)
    {
        $user = User::find($id);
        return view('profile.changephoto', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'avatar' => 'image'
        ]);
        $user= User::find($id);
        $data = $request->all();

        if($request->hasFile('avatar')){
            Storage::delete($user->avatar);
            $data['avatar'] = $request->file('avatar')->store("images/users");
        }
        $user->update($data);
        return  redirect()->route('userprofile');
    }   
}
