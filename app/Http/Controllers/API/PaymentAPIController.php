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
    private $constants;
    
    public function __construct(Constants $constants){
        $this->constants = $constants;
    }

    public function index(Request $request)
    {
        $auth = $this->checkauth($request);
        if($auth && $auth['status'] == 0){
            header("Content-Type: text/xml; charset=utf-8");
            $webService = new SoapServer($request->wsd_url);         
	    $webService->setObject(new PaynetService());
	    $webService->handle();
	    dd($webService->handle());
        }else{
            return response(json_encode([
                'status'  => $auth['status'],
                'message' => $auth['message'],
            ]), 401)->header('Content-Type', 'application/json');
        }
    }

    public function checkauth($request){
        $basic_access_token = $request->header('Authorization');
        if ($basic_access_token) {
            $access_tokenAr = explode(' ', $basic_access_token);
            $base64_decode  = base64_decode($access_tokenAr[1]);
            $login_cred = explode(':', $base64_decode);
            if (!isset($login_cred[0]) || !isset($login_cred[1])) {
                return [
                    'status' => 1,
                    'message' => 'Login or password is incorrect'
                ];
            }
            $login = $login_cred[0];
            $password = $login_cred[1];
            if ($login == $this->constants::$paynet_username || $password == $this->constants::$paynet_password){
                $request->merge(['wsd_url' => $this->constants::$wsdl_url]);
                return [
                    'status' => 0,
                    'message' => 'Auth success'
                ];
            }else{
                return [
                    'status'  => 1,
                    'message' => 'Login or password is incorrect'
                ];
            }
        }else{
            return [
                'status'  => 1,
                'message' => 'Authorization in header is required'
            ];
        }
    }
}
