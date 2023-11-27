<?php

return [
    // Admin Route
    'admin_route' => env('PEACHPAYMENT_ADMIN_ROUTE', 'admin/peach-payment'),

    // User Route
    'user_route' => env('PEACHPAYMENT_USER_ROUTE', 'peach-payment'),

    // Middleware
    'middleware' => ['web'],

    // Set environment
    'environment' => env('PEACHPAYMENT_ENVIRONMENT', 'sandbox'), // 'live' or 'sandbox'

    'live' => [
        'authentication_url' => 'https://dashboard.peachpayments.com',
        'checkout_url' => 'https://secure.peachpayments.com',
        'embedded_checkout_url' => 'https://checkout.peachpayments.com/js/checkout.js',
    ],

    'sandbox' => [
        'authentication_url' => 'https://sandbox-dashboard.peachpayments.com',
        'checkout_url' => 'https://testsecure.peachpayments.com',
        'embedded_checkout_url' => 'https://sandbox-checkout.peachpayments.com/js/checkout.js',
    ],
    
    // Entity ID
    'entity_id' => env('PEACHPAYMENT_ENTITY_ID'),

    // Client ID
    'client_id' => env('PEACHPAYMENT_CLIENT_ID'),

    // Client Secret
    'client_secret' => env('PEACHPAYMENT_CLIENT_SECRET'),

    // Merchant ID
    'merchant_id' => env('PEACHPAYMENT_MERCHANT_ID'),

    // Approved Domain and URL
    'domain' => env('PEACHPAYMENT_DOMAIN'),

    // Default Currency
    'currency' => env('PEACHPAYMENT_CURRENCY', 'ZAR'),
    
];