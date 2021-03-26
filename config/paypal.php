<?php
return [
    'client_id' => env('PAYPAL_CLIENT_ID'),
    'client_secret' => env('PAYPAL_SECRET_KEY'),
    'callback_url' => env('PAYPAL_CALLBACK_URL'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE'),
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/laravel.log',
        'log.LogLevel' => 'FINE',
    ),
];
