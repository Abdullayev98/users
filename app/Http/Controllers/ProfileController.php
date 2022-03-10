<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Http\Requests\User\PerformerCreateRequest;
use App\Http\Requests\UserPasswordRequest;
use App\Http\Requests\UserUpdateDataRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
        $description = $request->input('description');
        $data['user_id'] = $user->id;
        $data['comment'] = $comment;
        $data['description'] = $description;
        $dd = Portfolio::create($data);
        return $dd;

    }

    public function delete(Portfolio $portfolio)
    {
        portfolioGuard($portfolio);

        $portfolio->delete();
        return redirect()->route('userprofile');
    }

    public function UploadImage(Request $request)
    {
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

    public function testBase(Request $request)
    {
        $user = Auth::user();
        $comment = $user->portfolios()->orderBy('created_at', 'desc')->first();
        $image = File::allFiles("Portfolio/{$user->name}/{$comment->comment}");
        $json = implode(',', $image);
        $data['image'] = $json;
        $id = $comment->id;
        $base = new Portfolio;
        if ($base->where('id', $comment->id)->update($data)) {
            return redirect()->route('userprofile');
        } else {
            return dd(false);
        }


    }

    public function portfolio(Portfolio $portfolio)
    {
        $user = Auth::user();
        return view('profile/portfolio', compact('user', 'portfolio'));
    }

    //profile
    public function profileData()
    {
        $user = Auth::user();
        $views = $user->views_count;
        $task = $user->tasks_count;
        $task_count = $user->performer_tasks()->where('status', 4)->count();
        $ports = $user->portfoliocomments;
        $portfolios = $user->portfolios()->where('image', '!=', null)->get();
        // $image variable hech qatta ishlatilmayaptiku nega kiritgansizlar? Maqsad nima?
        $about = User::where('role_id', 2)->take(20)->get();
        $file = "Portfolio/{$user->name}";
        if (!file_exists($file)) {
            File::makeDirectory($file);
        }
        $b = File::directories(public_path("Portfolio/{$user->name}"));
        $directories = array_map('basename', $b);
        $categories = Category::withTranslations(['ru', 'uz'])->get();

        return view('profile.profile', compact('categories', 'about', 'portfolios', 'directories', 'task_count', 'user', 'views', 'task', 'ports'));
    }

    public function updates(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image'
        ]);
        $user = Auth::user();
        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $destination = 'storage/' . $user->avatar;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $request->file('avatar');
            $imagename = "user-avatar/" . $filename->getClientOriginalName();
            $filename->move(public_path() . '/storage/user-avatar/', $imagename);
            $data['avatar'] = $imagename;
        }
        $user->update($data);
        return redirect()->back();
    }

    //profile Cash
    public function profileCash()
    {
        $user = Auth()->user()->load('transactions');

        $balance = $user->walletBalance;
        $views = $user->views()->count();
        $task = $user->tasks()->count();
        $transactions = $user->transactions()->paginate(15);
        $about = User::where('role_id', 2)->orderBy('reviews', 'desc')->take(20)->get();
        $task_count = Task::where('performer_id', $user->id)->count();

        return view('profile.cash', compact('user', 'views', 'balance', 'task', 'about', 'task_count', 'transactions'));
    }

//settings
    public function editData()
    {
        $user = Auth::user();
        $views = $user->views()->count();
        $categories = Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get();
        $regions = Region::withTranslations(['ru', 'uz'])->get();
        $about = User::where('role_id', 2)->orderBy('reviews', 'desc')->take(20)->get();
        $task_count = Task::where('performer_id', $user->id)->count();
        return view('profile.settings', compact('user', 'categories', 'views', 'regions', 'about', 'task_count'));
    }

    public function updateData(UserUpdateDataRequest $request)
    {
        $data = $request->validated();
        if ($data['email'] != auth()->user()->email) {
            $data['is_email_verified'] = 0;
        }
        if ($data['phone_number'] != auth()->user()->phone_number) {
            $data['is_phone_number_verified'] = 0;
        }
        Auth::user()->update($data);
        Alert::success(__('Настройки успешно сохранены'));
        return redirect()->route('editData');
    }

    public function destroy($id)
    {
        auth()->user()->delete();
        return redirect('/');
    }

    //getCategory
    public function getCategory(Request $request)
    {
        $request->validate([
            'category' => 'required'
        ]);
        $user = Auth::user();
        $checkbox = implode(",", $request->get('category'));
        $user->update(['category_id' => $checkbox]);
        $user->role_id = 2;
        return redirect()->route('userprofile');
    }

    public function StoreDistrict(Request $request)
    {
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


    public function change_password(UserPasswordRequest $request)
    {

        $data = $request->validated();
        if (!$data) {
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

    public function verificationInfoStore(PerformerCreateRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();
        $user->update($data);
        return redirect()->route('verification.contact');
    }

    public function verificationContact()
    {
        return view('personalinfo.contact');
    }

    public function verificationContactStore(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'phone_number' => 'required|integer|min:9',
        ]);
        $user = auth()->user();
        $user->update($data);

        return redirect()->route('verification.photo');
    }

    public function verificationPhoto()
    {
        return view('personalinfo.profilephoto');
    }

    public function verificationPhotoStore(Request $request)
    {
        $user = Auth::user();
        if (!$user->avatar) {
            $request->validate([
                'avatar' => 'required|image'
            ]);
        }
        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $destination = 'storage/' . $user->avatar;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $request->file('avatar');
            $imagename = "user-avatar/" . $filename->getClientOriginalName();
            $filename->move(public_path() . '/storage/user-avatar/', $imagename);
            $data['avatar'] = $imagename;
        }
        $user->update($data);
        return redirect()->route('verification.category');
    }

    public function verificationCategory()
    {
        $categories = Category::withTranslations(['ru', 'uz'])->where('parent_id', null)->get();
        return view('personalinfo.personalcategoriya', compact('categories'));
    }

    public function createPortfolio(PortfolioRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        $data['image'] = session()->has('images') ? session('images'):'[]';

        session()->forget('images');
        Portfolio::create($data);
        return redirect()->route('userprofile');


    }


    public function storeProfileImage(Request $request)
    {
        if ($request->hasFile('image')) {

            $files = $request->file('image');
            $name = Storage::put('public/uploads', $files);
            $name = str_replace('public/', '', $name);
            $user = auth()->user();
            $user->avatar = $name;
            $user->save();
        }

        if ($name) {
            echo json_encode(['status' => 1, 'msg' => 'success', 'name' => $name]);
        } else {
            echo json_encode(['status' => 0, 'msg' => 'failed']);
        }
    }
}

