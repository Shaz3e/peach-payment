<?php

namespace Shaz3e\PeachPayment\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class PeachPayment
{
    /**
     * Create checkout
     */
    public static function createCheckout($amount)
    {
        $checkout_url = config('peach-payment.checkout_url');

        $domain = config('peach-payment.domain');
        
        $token = self::getToken();
        $headers = [
            'Accept: application/json',
            'Referer: '. $domain,
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token,
        ];

        $nonce = 'UNQ-' . time();

        $entity_id = config('peach-payment.entity_id');
        $currency = config('peach-payment.currency');
        $order_number = 'O-' . time();
        $data = [
            'currency' => $currency,
            'forceDefaultMethod' => false,
            'authentication.entityId' => $entity_id,
            'merchantTransactionId' => $order_number,
            'amount' => $amount,
            'nonce' => $nonce,
            'shopperResultUrl' => $domain.'/'.$order_number,
            'defaultPaymentMethod' => 'CARD',
        ];
        // $response = Http::withHeaders($headers)->post($checkout_url, $data); // Production
        // $response = Http::withoutVerifying()->withHeaders($headers)->post($checkout_url, $data); // Development
        // return $response; // Access Denied

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $checkout_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        // Disable SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Remove this line in production
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Remove this line in production
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $result = curl_exec($ch);
        
        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        }
        
        curl_close($ch);
        
        $responseData = json_decode($result, true);
        $checkoutId = $responseData['checkoutId'];
        return $checkoutId;

        // // Check for request success
        // if ($response->successful()) {
        //     $responseData = $response->json();
        //     $entityId = $entity_id;
        //     $checkoutId = $responseData['checkoutId'];

        //     return ['entityId' => $entityId, 'checkoutId' => $checkoutId];
        // } else {
        //     // Handle request failure
        //     throw new \Exception('Error creating checkout');
        // }
    }

    /**
     * Get token
     */
    private static function getToken()
    {
        // config api url
        $api_url = config('peach-payment.api_url');
        $tokenEndpoint = $api_url.'/api/oauth/token';

        $client_id = config('peach-payment.client_id');
        $client_secret = config('peach-payment.client_secret');
        $merchant_id = config('peach-payment.merchant_id');

        // $response = Http::post($tokenEndpoint, [ // Production
        $response = Http::withoutVerifying()->post($tokenEndpoint, [ // Development
            'clientId' => $client_id,
            'clientSecret' => $client_secret,
            'merchantId' => $merchant_id,
        ]);

        // Check for request success
        if ($response->successful()) {
            $accessToken = $response->json('access_token');

            // Use the access token as needed
            return $accessToken;
        } else {
            // Handle request failure
            throw new \Exception('Error getting access token');
        }
    }
}