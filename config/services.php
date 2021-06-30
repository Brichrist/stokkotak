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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    // 'firebase' => [
    //     'api_key' => 'AIzaSyDmJSeaabs1RwBNKlkzn8Ucn9Oo9WH-f6c',
    //     'auth_domain' => 'stockkotak-f22ff.firebaseapp.com',
    //     // 'database_url' => 'database_url',
    //     'project_id' => 'stockkotak-f22ff',
    //     'storage_bucket' => 'stockkotak-f22ff.appspot.com',
    //     'messaging_sender_id' => '296569358792',
    //     'app_id' => '1:296569358792:web:8887957c3b5694abbf98fd',
    //     'measurement_id' => 'G-NFYGM94VQM',

    // ],

];
