<?php

return [
    'merchant_id' => env('PAYCOM_MERCHANT'),

    // Login is always "Paycom"
    'login'       => 'Paycom',
    'table' => [
        'transactions' => env('PAYCOM_TRANSACTION', 'paycom_transactions'),
        'orders' => env('PAYCOM_ORDERS', 'all_transactions'),
    ],
    // File with cashbox key (key can be found in cashbox settings)
    'keyFile'     => env('PAYCOM_KEY_TEST'),

    // Your database settings
    'db'          => [
        'host'     => env('DB_HOST'),
        'database' => env('DB_DATABASE'),
        'username' => env('DB_USERNAME'),
        'password' => env('DB_PASSWORD'),
    ],
];
