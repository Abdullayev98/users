<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    //login with facebook
    public function facebookRedirect(){
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook(){
        $user = Socialite::driver('facebook')->user();
        $findUser = User::where('facebook_id',$user->id)->first();
        if($findUser){
            Auth::login($findUser);
            return redirect('/');
        }else{
            $new_user = new User();
            $new_user->name = $user->name;
            $new_user->email = $user->email;
            $new_user->facebook_id = $user->id;
            $new_user->password = encrypt('123456');
            $new_user->save();
            Auth::login($new_user);
            return redirect('/');
        }
    }


    // login with google
    public function googleRedirect(){
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle(){

        try {
            $user = Socialite::driver('google')->setScopes(['openid', 'email'])->user();
            $findUser = User::where('google_id', $user->id)->first();
            if ($findUser) {
                Auth::login($findUser);
                return redirect('/');
            } else {
                $new_user = new User();
                $new_user->name = $user->name;
                $new_user->email = $user->email;
                $new_user->google_id = $user->id;
                $new_user->password = encrypt('123456');
                $new_user->save();
                Auth::login($new_user);
                return redirect('/');
            }
        } catch (Exception $e){
            dd($e->getMessage());

        }
    }
}
