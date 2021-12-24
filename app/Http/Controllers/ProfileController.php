<?php

namespace App\Http\Controllers;

use File;
use App\Models\User;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\UserView;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{

    //profile
    public function profileData()
    {
        $user = User::find(Auth::user()->id);
        $vcs = UserView::where('user_id', $user->id)->first();
        return view('profile.profile', compact('user','vcs'));
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
            $filename = request()->file('avatar');
            $extention = File::extension($filename);
            $file = $filename;
            $file->store('images/users', ['disk' => 'avatar']);
        }
        $user->update($data);
        return  redirect()->route('userprofile');
    }

    //profile Cash
    public function profileCash()
    {
        $user = User::find(Auth::user()->id);
        $vcs = UserView::where('user_id', $user->id)->first();
        return view('profile.cash', compact('user','vcs'));
    }
    public function updateCash(Request $request, $id)
    {
        $request->validate([
            'avatar' => 'required|image'
        ]);
        $user= User::find($id);
        $data = $request->all();

        if($request->hasFile('avatar')){
            Storage::delete($user->avatar);
            $data['avatar'] = $request->file('avatar')->store("images/users");
            $filename = request()->file('avatar');
            $extention = File::extension($filename);
            $file = $filename;
            $file->store('images/users', ['disk' => 'avatar']);
        }
        $user->update($data);
        return  redirect()->route('userprofile');
    }

    //settings
    public function editData()
    {
        $user = User::find(Auth::user()->id);
        $vcs = UserView::where('user_id', $user->id)->first();
        $categories = DB::table('categories')->where('parent_id',Null)->get();
        return view('profile.settings', compact('user','categories','vcs'));
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
            'phone_number'=>$request->input('phone_number'),
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
            $filename = request()->file('avatar');
            $extention = File::extension($filename);
            $file = $filename;
            $file->store('images/users', ['disk' => 'avatar']);
        }
        $user->update($data);
        return  redirect()->route('editData');
    }
    public function destroy()
    {
        User::find(Auth::user()->id)->delete();
        return  redirect('/');
    }

    //getCategory
    public function getCategory(Request $request)
    {
        $request->validate([
            'category' => 'required'
        ]);
        $id = Auth::id();
        $checkbox = implode(",", $request->get('category'));
        DB::update('update users set category_id = ? where id = ?',[$checkbox,$id]);
        return redirect()->back();
    }

    public function StoreDistrict(Request $request){
        $request->validate([
            'district' => 'required',
        ]);

       $user = User::find(Auth::user()->id);
        $user->district = $request->district;
        $user->save();
        return redirect()->back();
    }
}
