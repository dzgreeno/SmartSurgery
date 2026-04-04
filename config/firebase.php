<?php

return [

    'default' => env('FIREBASE_PROJECT', 'app'),

    'projects' => [

        'app' => [
    'firestore' => [
    'database' => '(default)',
    'transport' => 'rest',
 ],
     'credentials' => [
    'file' => storage_path('app/smartsurgery-95e65-firebase-adminsdk-fbsvc-4bb9f6eba7.json'),


                'auto_discovery' => true,
            ],

            'database' => [
                'url' => env('FIREBASE_DATABASE_URL'),
            ],

            'dynamic_links' => [
                'default_domain' => env('FIREBASE_DYNAMIC_LINKS_DEFAULT_DOMAIN'),
            ],

            'cache_store' => env('FIREBASE_CACHE_STORE', 'file'),

            'logging' => [
                'http_log_channel' => env('FIREBASE_HTTP_LOG_CHANNEL'),
            ],

        ],

    ],

];