<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function profileData()
    {
        // $email = 'admin@admin.com';
        // $user = User::whereEmail($email)->first();
        $user = User::find(Auth::user()->id);
        // dd($user->id);
        return view('profile.profile', compact('user'));
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