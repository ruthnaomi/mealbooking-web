<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mpesa' => [
        // GENERAL GLOBAL MPESA VARS
        'key' => env('MPESA_CONSUMER_KEY'),
        'secret' => env('MPESA_CONSUMER_SECRET'),
        'oauth_url' => env('MPESA_API_OAUTH_URL'),
        'ssl' => env('MPESA_USE_SSL',true),
        'cert' => env('MPESA_API_CERT_PATH'),
        'password' => env('MPESA_SANDBOX_PASS_KEY'),
        'initiator' => env('MPESA_API_INITIATOR_NAME'),
        'payBillNo' => env('MPESA_API_LIPA_NA_MPESA_NO'),
        // C2B ONLY
        'c2b_register_url' => env('MPESA_API_C2B_REGISTER_URL'),
        'c2b_shortcode_no' => env('MPESA_API_C2B_SHORTCODE_NO'),
        'c2b_confirmation_url' => env('MPESA_API_C2B_CONFIRMATION_URL'),
        'c2b_validation_url' => env('MPESA_API_C2B_VALIDATION_URL'),
        'c2b_simulate_url' => env('MPESA_API_C2B_SIMULATE_URL'),
        // Check Transaction Status
        'check_transaction_url' => env('MPESA_API_CHECK_TRANSACTION_URL'),
        'results_url'=>env('MPESA_RESULTS_URL'),
        'timeout_url'=>env('MPESA_QUEUE_TIMEOUT_URL'),
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

];
