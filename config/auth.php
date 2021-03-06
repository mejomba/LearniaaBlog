<?php
return [
    /* Authentication Defaults */
    'defaults' => ['guard' => 'web', 'passwords' => 'users',],

    /* Authentication Guards | Supported: "session", "token" */
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
    ],

    /*  User Providers | Supported: "database", "eloquent" */
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
    ],
    
    'socialite' => [
        'drivers' => [
            'google',
        ],
    ],

    /* Resetting Passwords */
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
