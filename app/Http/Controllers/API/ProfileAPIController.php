<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateDataRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileAPIController extends Controller
{
    public function index(User $user){
        return $user;
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
        return  response()->json(['status'=>true,'message'=>"avatar successfully changed"]);
    }

    /**
     * @OA\Get(
     *     path="/api/settings",
     *     tags={"Profile"},
     *     summary="Get list of Settings",
     *     security={
     *      {"token": {}},
     *     },
     *     @OA\Response(
     *          response=200,
     *          description="successful operation",
     *     )
     * )
     */
    public function settings()
    {
        $user = User::find(Auth::user()->id);
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'location' => $user->location,
            'age' => $user->age,
            'role_id' => $user->role_id,
            'description' => $user->description,
        ]);
    }

    public function updateData(UserUpdateDataRequest $request)
    {
        $data = $request->validated();
        if ($data['email'] != auth()->user()->email) {
            $data['is_email_verified'] = 0;
            $data['email_old'] = auth()->user()->email;
        }
        if ($data['phone_number'] != auth()->user()->phone_number) {
            $data['is_phone_number_verified'] = 0;
            $data['phone_number_old'] = auth()->user()->phone_number;
        }
        Auth::user()->update($data);
        Alert::success(__('Настройки успешно сохранены'));
        return redirect()->route('editData');
    }

}
