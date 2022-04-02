<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;

class SocialController extends Controller
{
    //login with facebook
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        $user = Socialite::driver('facebook')->setScopes(['email'])->user();
        $findUser = User::where('email', $user->email)->first();

        if (!$user->email) {
            $findUser = User::where('facebook_id', $user->id)->first();
        }


        if ($findUser) {
            $findUser->facebook_id = $user->id;
            $findUser->save();
            Alert::success('Success', 'You\'ve Successfully linked your facebook account');
            Auth::login($findUser);
            return redirect()->route('userprofile');
        } else {
            $new_user = new User();
            $new_user->name = $user->name;
            $new_user->email = $user->email;
            $new_user->facebook_id = $user->id;
            $new_user->avatar = self::get_avatar($user);
            $new_user->password = encrypt('123456');
            $new_user->save();
            Auth::login($new_user);
            return redirect()->route('userprofile');
        }
    }


    // login with google
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }


    private static function get_avatar($user)
    {
        $fileContents = file_get_contents($user->getAvatar());
        File::put(public_path() . '/storage/users-avatar/' . $user->getId() . ".jpg", $fileContents);
        $picture = 'users-avatar/' . $user->getId() . ".jpg";

        return $picture;
    }

    public function loginWithGoogle()
    {

        try {
            $user = Socialite::driver('google')->setScopes(['openid', 'email'])->user();


            $findUser = User::where('email', $user->email)->first();

            if (!$user->email) {
                $findUser = User::where('google_id', $user->id)->first();

            }

            if ($findUser) {
                $findUser->google_id = $user->id;
                $findUser->save();
                Auth::login($findUser);
                Alert::success('Success', 'You\'ve Successfully linked your google account');
                return redirect()->route('userprofile');
            } else {
                $new_user = new User();
                $new_user->name = $user->name;
                $new_user->email = $user->email;
                $new_user->google_id = $user->id;
                $new_user->avatar = self::get_avatar($user);
                $new_user->password = encrypt('123456');
                $new_user->save();
                Auth::login($new_user);
                return redirect()->route('userprofile');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
