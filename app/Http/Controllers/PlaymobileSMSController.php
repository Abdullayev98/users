<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use PlayMobile\SMS\SmsService;
use PlayMobile\SMS\Models\SmsLog;
use PlayMobile\SMS\Http\Classes\CommonFunctions;

class PlaymobileSMSController extends Controller
{
    public function sendMessage(Request $request)
    {
    $request->validate([
        'phone'   => 'required|size:9',
        'message' => 'required|max:160',
    ]);
    $response = (new SmsService())->send($request->phone, $request->message);
    SmsLog::create([
        'phone'    => $request->phone,
        'message'  => $request->message,
        'response' => $response,
        'status'   => ($response == 'Request is received') ? SmsLog::STATUS_SUCCESS : SmsLog::STATUS_FAILD
    ]);
     return $response;
    }

    public function test($phone){
        $message  = "Test-SMS ". date('d.m.y h:i:s');
        $response = (new SmsService())->send($phone,$message);
        SmsLog::create([
            'phone'    => $phone,
            'message'  => $message,
            'response' => $response,
            'status'   => SmsLog::STATUS_TEST
        ]);
        return $response;
    }
}
