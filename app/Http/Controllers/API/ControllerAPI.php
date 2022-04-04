<?php

namespace App\Http\Controllers\API;

use App\Models\Advant;
use App\Models\Task;
use App\Models\How_work_it;
use App\Models\User;
use App\Models\Reklama;
use App\Models\Trust;
use App\Models\UserView;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Js;
use TCG\Voyager\Models\Category;
use App\Http\Controllers\Controller;


class ControllerAPI extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home(Request $request)
    {
        $categories = Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get();
        $tasks  =  Task::where('status', 1)->orWhere('status',2)->orderBy('id', 'desc')->take(20)->get();
        $howitworks = How_work_it::all();
        if (!session()->has('lang')) {
            Session::put('lang', 'ru');
        }
        $random_category = Category::skip(1)->first();
        $users_count = User::where('role_id', 2)->count();
        $advants = Advant::all();
        $reklamas = Reklama::all();
        $trusts = Trust::orderby('id', 'desc')->get();
        return response()->json(['tasks'=>$tasks, 'howitworks'=>$howitworks, 'categories'=>$categories, 'random_category'=>$random_category, 'users_count'=>$users_count, 'advants'=>$advants, 'reklamas'=>$reklamas, 'trusts'=>$trusts]);
    }

    public function home_profile()
    {
        $user = User::find(Auth::user()->id);
        $vcs = UserView::where('user_id', $user->id)->get();
        return response()->json(['user'=>$user, 'vcs'=>$vcs]);
        //return view('profile.profile', compact('user', 'vcs'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'avatar' => 'required|image'
        ]);
        $user = User::find($id);
        $data = $request->all();

        if ($request->hasFile('avatar')) {
            Storage::delete($user->avatar);
            $data['avatar'] = $request->file('avatar')->store("images/users");
            // $filename = $request->file('avatar')->getClientOriginalName();
            // Storage::disk('avatar')->putFileAs('images/users', $request->file('avatar'), $filename);
            $filename = request()->file('avatar');
            $extention = File::extension($filename);
            $file = $filename;
            $file->store('images/users', ['disk' => 'avatar']);
        }
        $user->update($data);
        return response()->json(['message'=>'avatar changed']);
        //return  redirect()->route('profile.profileData');
    }

    public function category($id)
    {
        $categories = Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get();
        $choosed_category = Category::withTranslations(['ru', 'uz'])->where('id', $id)->get();
        $child_categories = Category::withTranslations(['ru', 'uz'])->where('parent_id', $id)->get();
        $idR = $id;
        return response()->json(['child_categories'=>$child_categories, 'categories'=>$categories, 'choosed_category'=>$choosed_category, 'idR'=>$idR]);
        //return view('task/choosetasks', compact('child_categories', 'categories', 'choosed_category', 'idR'));
    }
    public function lang($lang)
    {
        Session::put('lang', $lang);
        return response()->json($lang);
        //return redirect()->back();
    }
}
