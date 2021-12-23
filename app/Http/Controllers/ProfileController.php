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
        $user = User::find(Auth::user()->id);
        return view('profile.profile', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'avatar' => 'required|image'
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
    public function editData()
    {
        $user = User::find(Auth::user()->id);
        return view('profile.settings', compact('user'));
    }
    public function updateData(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'age' => 'required',
            'phone_number' => 'required',
            'description' => 'required',
            'location' => 'required'
        ]);
        $user = User::find(Auth::user()->id)
        ->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'age'=>$request->input('age'),
            'phone_number'=>"+".$request->input('phone_number'),
            'description'=>$request->input('description'),
            'location'=>$request->input('location'),
        ]);
        return  redirect()->route('editData');
    }
    public function imageUpdate(Request $request, $id)
    {
        $request->validate([
            'avatar' => 'required|image'
        ]);
        $user= User::find($id);
        $data = $request->all();

        if($request->hasFile('avatar')){
            Storage::delete($user->avatar);
            $data['avatar'] = $request->file('avatar')->store("images/users");
        }
        $user->update($data);
        return  redirect()->route('editData');
    }
    public function destroy()
    {
        User::find(Auth::user()->id)->delete();
        return  redirect('/');
    }
}
