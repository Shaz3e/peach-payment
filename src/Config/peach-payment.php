<?php

return [
    // Admin Route
    'admin_route' => env('PEACHPAYMENT_ADMIN_ROUTE', 'admin/peach-payment'),

    // User Route
    'user_route' => env('PEACHPAYMENT_USER_ROUTE', 'peach-payment'),

    // Middleware
    'middleware' => ['web'],

    // Default Currency
    'currency' => env('PEACHPAYMENT_CURRENCY', 'ZAR'),

    // API URL
    'api_url' => env('PEACHPAYMENT_API_URL', 'https://sandbox-dashboard.peachpayments.com'),

    // Client ID
    'client_id' => env('PEACHPAYMENT_CLIENT_ID'),

    // Client Secret
    'client_secret' => env('PEACHPAYMENT_CLIENT_SECRET'),

    // Merchant ID
    'merchant_id' => env('PEACHPAYMENT_MERCHANT_ID'),

    // Checkout URL
    'checkout_url' => env('PEACHPAYMENT_CHECKOUT_URL', 'https://testsecure.peachpayments.com/v2/checkout'),

    // Domain
    'domain' => env('PEACHPAYMENT_DOMAIN'),

    // Entity ID
    'entity_id' => env('PEACHPAYMENT_ENTITY_ID'),
];