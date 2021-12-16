<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Services\Paynet\Constants;
use App\Services\Paynet\Services\PaynetService;
use Illuminate\Validation\ValidationException;
use SoapServer;

class PaymentAPIController extends Controller
{
    public function __construct(Constants $constants){
        $basic_access_token = request()->header('Authorization');
        if ($basic_access_token) {
            $access_tokenAr = explode(' ', $basic_access_token);
            $base64_decode  = base64_decode($access_tokenAr[1]);
            $login_cred = explode(':', $base64_decode);
            if (!isset($login_cred[0]) || !isset($login_cred[1])) {
                return response(json_encode([
                    'status' => 1,
                    'message' => 'Login or password is incorrect'
                ]), 401)->header('Content-Type', 'application/json');
            }
            $login = $login_cred[0];
            $password = $login_cred[1];
            if ($login == $constants::$paynet_username || $password == $constants::$paynet_password){
                request()->merge(['wsd_url' => $constants::$wsdl_url]);
            }else{
                return response(json_encode([
                    'status'  => 1,
                    'message' => 'Login or password is incorrect'
                ]), 401)->header('Content-Type', 'application/json');
            }
        }else{
            return response(json_encode([
                'status'  => 1,
                'message' => 'Authorization in header is required'
            ]), 401)->header('Content-Type', 'application/json');
        }
    }

    public function index(Request $request)
    {
        header("Content-Type: text/xml; charset=utf-8");
        $webService = new SoapServer($request->wsd_url);
        $webService->setObject(new PaynetService());
        $webService->handle();
    }
}
