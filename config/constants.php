<?php
return [
    'paynet' => [
        'minimum_amount'    => env('MINIMUM_AMOUNT', ''),
        'paynet_username'   => env('PAYNET_USERNAME', ''),
        'paynet_password'   => env('PAYNET_PASSWORD', ''),
        'paynet_service_id' => env('PAYNET_SERVICE_ID', ''),
        'index_url'         => env('INDEX_URL', ''),
        'wsdl_url'          => env('WSDL_URL', '')
    ],
    'paycom' => [
        'paycom_merchant'  => env('PAYCOM_MERCHANT',''),
        'paycom_login'     => env('PAYCOM_LOGIN','Paycom'),
        'paycom_key'       => env('PAYCOM_KEY',''),
        'paycom_key_test'  => env('PAYCOM_KEY_TEST','')
    ]
];