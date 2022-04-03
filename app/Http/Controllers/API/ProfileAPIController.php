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


    /**
     *
     * @OA\Post (
     *     path="/api/settings/update",
     *     tags={"Profile"},
     *     summary="Update Settings",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="age",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="phone_number",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="description",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="location",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "email":"admin@admin.com",
     *                     "age":17,
     *                     "phone_number":"999098998",
     *                     "description":"Assalomu aleykum",
     *                     "location":"Xorazm viloyati",
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="email", type="string", example="admin@admin.com"),
     *              @OA\Property(property="age", type="integer", example=20),
     *              @OA\Property(property="phone_number", type="string", example="999098998"),
     *              @OA\Property(property="description", type="string", example="Assalomu aleykum"),
     *              @OA\Property(property="location", type="string", example="Xorazm viloyati"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *     security={
     *         {"token": {}}
     *     },
     * )
     */
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
        return redirect()->route('profile.editData');
    }

}
