<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPasswordRequest;
use App\Http\Requests\UserUpdateDataRequest;
use Illuminate\Support\Facades\Hash;
use \TCG\Voyager\Models\Category;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
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
    //portfolio
    public function comment(Request $request)
    {
        $user = Auth::user();
        $comment = $request->input('comment');
        $data['user_id'] = $user->id;
        $data['comment'] = $comment;
        $user = Portfolio::where('comment', $comment)->first();
        $dd = Portfolio::create($data);
        return $dd;

    }
    public function create(array $data)
    {
        $dd = Portfolio::create($data);
        return $dd;
    }
    public function UploadImage(Request $request)
    {
        $user = Auth::user();
        $comment = Portfolio::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();

        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')
                ->move(public_path("Portfolio/{$user->name}/{$comment->comment}"), $fileName);

            $fileModelname = time() . '_' . $request->file->getClientOriginalName();
            $a = $request->file->getClientOriginalName();
            $request->session()->put('image', $a);
            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $fileName
            ]);
        }
    }
    public function testBase(Request $request)
    {
        $user = Auth::user();
        $comment = Portfolio::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
        $image = File::allFiles("Portfolio/{$user->name}/{$comment->comment}");
        $json = implode(',',$image);
        $data['image'] = $json;
        $id = $comment->id;
        $base = new Portfolio;
        if($base->where('id',$comment->id)->update($data)){
            return redirect()->route('userprofile');
        }else{
            return dd(false);
        }


    }
    //profile
    public function profileData()
    {
        $user = Auth::user();
        $views = count( UserView::where('performer_id', $user->id)->get());
        $task = Task::where('user_id',Auth::user()->id)->count();
        $task_count = Task::where('performer_id', Auth::id())->where('status',4)->count();
        $ports = Portfoliocomment::where('user_id', Auth::user()->id)->get();
        $comment = Portfolio::where('user_id', $user->id)->where('image', '!=', null)->first();

        if($comment != null){
            $image = $comment["image"];
            $images = explode(',',$image);
            $image = File::glob(public_path("Portfolio/{$user->name}/{$comment}").'/*');
        }else{
            $image = [0,1];
            $images = [0,1];
        }

        $a = File::directories(public_path("Portfolio/{$user->name}"));
        $file = "Portfolio/{$user->name}";
        //dd($a);
        if(!$a){
            File::makeDirectory($file);
        }
        $b = File::directories(public_path("Portfolio/{$user->name}"));
        $directories = array_map('basename', $b);
        return view('profile.profile', compact('images','directories','task_count','image','user','views','task','ports'));
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
    //personal info Ijrochi uchun

    public function verificationIndex()
    {
        return view('verification.verification');
    }
    public function verificationInfo()
    {
        return view('personalinfo.personalinfo');
    }
    public function verificationInfoStore(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'name' => 'required',
            'familya' => 'required',
            'date' => 'required',
        ]);
        $user = Auth::user();
        $user->location = $request->location;
        $user->last_name = $request->familya;
        $user->name = $request->name;
        $user->born_date = $request->date;
        $user->save();

        return  redirect()->route('verification.contact');
    }
    public function verificationContact()
    {
        return view('personalinfo.contact');
    }
    public function verificationContactStore(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'phone_number' => 'required',
        ]);
        $user = Auth::user();
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->save();

        return  redirect()->route('verification.photo');
    }
    public function verificationPhoto()
    {
        return view('personalinfo.profilephoto');
    }
    public function verificationPhotoStore(Request $request)
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
        return  redirect()->route('verification.category');
    }
    public function verificationCategory()
    {
        $categories = Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get();
        return view('personalinfo.personalcategoriya', compact('categories'));
    }

}
