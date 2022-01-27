<?php

namespace App\Http\Controllers;

use App\Models\Portfolio_new;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Task;
use App\Models\WalletBalance;
use App\Models\All_transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserView;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{



    //profile
    public function profileData()
    {
        $user = Auth::user();
        $vcs = UserView::where('user_id', $user->id)->first();
        $task = Task::where('user_id',Auth::user()->id)->count();
        $ports = Portfolio_new::where('user_id',Auth::user()->id)->get();
        return view('profile.profile', compact('user','vcs','task','ports'));
    }
    public function updates(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image'
        ]);
        $user= Auth::user();
        $data = $request->all();
        if($request->hasFile('avatar')){
            $destination = 'AvatarImages/'.$user->avatar;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $filename = $request->file('avatar');
            $imagename = "images/users/".$filename->getClientOriginalName();
            $filename->move(public_path().'/AvatarImages/images/users/',$imagename);
            $data['avatar'] = $imagename;
        }
        $user->update($data);
        return  redirect()->route('userprofile');
    }

    //profile Cash
    public function profileCash()
    {
        $user = Auth()->user();
        $balance = WalletBalance::where('user_id', Auth::user()->id)->first();
        $vcs = UserView::where('user_id', $user->id)->first();
        $task = Task::where('user_id',Auth::user()->id)->count();
        $transactions = All_transaction::where('user_id', Auth::id())->get();
        $transactions_count = All_transaction::where('user_id', Auth::id())->count();
        return view('profile.cash', compact('transactions_count', 'transactions', 'user', 'vcs', 'balance', 'task'));
    }
    public function updateCash(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image'
        ]);
        $user= Auth::user();
        $data = $request->all();
        if($request->hasFile('avatar')){
            $destination = 'AvatarImages/'.$user->avatar;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $filename = $request->file('avatar');
            $imagename = "images/users/".$filename->getClientOriginalName();
            $filename->move(public_path().'/AvatarImages/images/users/',$imagename);
            $data['avatar'] =$imagename;
        }
        $user->update($data);
        return  redirect()->route('userprofilecash');
    }

    //settings
    public function editData()
    {
        $user = Auth::user();
        $views = count(UserView::where('performer_id', $user->id)->get());

        $categories = DB::table('categories')->where('parent_id',Null)->get();
        $task = Task::where('user_id',Auth::user()->id)->count();
        return view('profile.settings', compact('user','categories','views','task'));
    }
    public function updateData(Request $request)
    {
      $int = (int)$request->input('role');
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'age' => 'required',
            'phone_number' => 'required',
            'description' => 'required',
            'location' => 'required',
            'role' => 'required',
        ]);
        Auth::user()->update([
            'name'=>$request->input('name'),
            'settings'=>$request->input('name'),
            'email'=>$request->input('email'),
            'age'=>$request->input('age'),
            'phone_number'=>$request->input('phone_number'),
            'description'=>$request->input('description'),
            'location'=>$request->input('location'),
            'role_id'=>$int,
        ]);
        return  redirect()->route('editData');
    }
    public function imageUpdate(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image'
        ]);
        $user= Auth::user();
        $data = $request->all();
        if($request->hasFile('avatar')){
            $destination = 'AvatarImages/'.$user->avatar;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $filename = $request->file('avatar');
            $imagename = "images/users/".$filename->getClientOriginalName();
            $filename->move(public_path().'/AvatarImages/images/users/',$imagename);
            $data['avatar'] =$imagename;
        }
        $user->update($data);
        return  redirect()->route('editData');
    }
    public function destroy()
    {
        Auth::user()->delete();
        return  redirect('/');
    }

    //getCategory
    public function getCategory(Request $request)
    {
        $request->validate([
            'category' => 'required'
        ]);
        $id = Auth::user()->id;
        $checkbox = implode(",", $request->get('category'));
        User::where('id',$id)->update(['category_id'=>$checkbox]);
        return redirect()->back();
    }

    public function StoreDistrict(Request $request){
        $request->validate([
            'district' => 'required',
        ]);

        $user = Auth::user();
        $user->district = $request->district;
        $user->save();
        return redirect()->back();
    }

    //portfolio
    public function StorePicture(Request $request){
            $request->validate([
              'image' => 'required|image'
            ]);
            $portfolio = new Portfolio_new;
            $photo = $request->file('image');

            if($photo){
                // $image_name = time() . '.' . $photo->getClientOriginalExtension();
                $imagename = "images/portfolios/".$photo->getClientOriginalName();
                $photo->move(public_path().'/AvatarImages/images/portfolios/',$imagename);
                $portfolio->image = $imagename;
            }
            $portfolio->user_id = Auth::user()->id;
            $portfolio->comment = $request->comment;
            $portfolio->save();
            return back();
        }
    public function EditDescription(Request $request)
    {
        $user = Auth::user();
        $user->description = $request->description;
        $user->save();
        return redirect()->back();

    }
}
