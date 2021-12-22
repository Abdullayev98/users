<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use TCG\Voyager\Facades\Voyager;
use \TCG\Voyager\Http\Controllers\VoyagerAuthController as VoyagerBaseAuthController;

class VoyagerAuthController extends VoyagerBaseAuthController
{


    public function login()
    {
        if ($this->guard()->user()) {
            if(!$this->guard()->user()->is_active){
                throw ValidationException::withMessages([
                    $this->username() => [trans('Sizga kirish taqiqlangan!')],
                ]);
            }
            return redirect()->route('voyager.dashboard');
        }


        return Voyager::view('voyager::login');
    }
    public function postLogin(Request $request)
    {
        $this->validateLogin($request);


        $user = User::query()->where("email", $request->email)->first();

        if( $user && !$user->is_active){
            throw ValidationException::withMessages([
                $this->username() => [trans('Sizga kirish taqiqlangan!')],
            ]);
        }

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->credentials($request);

        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);


        return $this->sendFailedLoginResponse($request);
    }

}
