<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPasswordRequest;
use App\Http\Requests\UserUpdateDataRequest;
use Illuminate\Support\Facades\Hash;
use \TCG\Voyager\Models\Category;
use App\Models\Portfolio_new;
use App\Models\Region;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Task;
use App\Models\WalletBalance;
use App\Models\All_transaction;
use App\Models\Portfoliocomment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserView;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{



    //profile
    public function profileData()
    {
        $user = Auth::user();
        $views = count( UserView::where('performer_id', $user->id)->get());
        $task = Task::where('user_id',Auth::user()->id)->count();
        $ports = Portfoliocomment::where('user_id',Auth::user()->id)->get();
        return view('profile.profile', compact('user','views','task','ports'));
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
        $views = count( UserView::where('performer_id', $user->id)->get());
        $task = Task::where('user_id',Auth::user()->id)->count();
        $transactions = All_transaction::where('user_id', Auth::id())->get();
        $transactions_count = All_transaction::where('user_id', Auth::id())->count();
        return view('profile.cash', compact('transactions_count', 'transactions', 'user', 'views', 'balance', 'task'));
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
        $views = count( UserView::where('performer_id', $user->id)->get());
        $categories = Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get();
        $regions = Region::withTranslations(['ru','uz'])->get();

        return view('profile.settings', compact('user','categories','views','regions'));
    }
    public function updateData(UserUpdateDataRequest $request)
    {
        $data = $request->validated();
        $data['is_phone_number_verified'] = 0;
        $data['is_email_verified'] = 0;
        Auth::user()->update($data);
        Alert::success('Success', "Successfully Updated");
        return  redirect()->route('editData');
    }
    public function imageUpdate(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image'
        ]);
        $user= Auth::user();
        if($request->hasFile('avatar')){
            $destination = 'storage/'.$user->avatar;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $filename = $request->file('avatar');
            $imagename = "user-avatar/".$filename->getClientOriginalName();
            $filename->move(public_path().'/storage/user-avatar/',$imagename);
            $data['avatar'] =$imagename;
        }
        $user->update($data);
        return  redirect()->route('editData');
    }
    public function destroy($id){
        $user = User::where('id', $id)->first();
        $user->delete();
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
          'images' => 'required|image',
          'comment' => 'required',
        ]);
        $photos = $request->file('images');
        if($photos){
            $comment = new Portfoliocomment;
            $comment->description = $request->comment;
            $comment->user_id = auth()->user()->id;
            $comment->save();
            foreach ($photos as $imagefile) {
                $portfolio = new Portfolio_new;
                $imagename = $imagefile->getClientOriginalName();
                $portfolio->image= $imagename;
                $imagefile->move(public_path().'/AvatarImages/images/portfolios/',$imagename);
                $portfolio->comment_id = $comment->id;
                $portfolio->save();
              }
        }
        return redirect()->back();
    }

    public function EditDescription(Request $request)
    {
        $user = Auth::user();
        $user->description = $request->description;
        $user->save();
        return redirect()->back();

    }


    public function change_password(UserPasswordRequest $request){

        $data = $request->validated();
        if(!$data){
            return redirect()->route('settings#four');
        }

        $data['password'] = Hash::make($data['password']);
        auth()->user()->update($data);

        Alert::success("Success!", "Your Password was successfully updated");

        return redirect()->back()->with([
            'password' => 'password'
        ]);


    }


}
