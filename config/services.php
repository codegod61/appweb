<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'google' => [
        'client_id' => '153718602862-t8renjljgn5hj8qv3m8fda9kqlsrpt8h.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

    'twitter' => [
        'client_id' => 'XhPosp4A3r5kDOrF1NFhBs0pu',
        'client_secret' => 'S8QKIPHwbOHUx0ezEgWZyFVz1wUy5vT3TGnVQkgDb8qpanE6pE',
        'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
