<?php
return [
    /* Default Filesystem Disk */
    'default' => env('FILESYSTEM_DRIVER', 'files'),

    /* Default Cloud Filesystem Disk */
    'cloud' => env('FILESYSTEM_CLOUD', 'files'),

    /* Filesystem Disks | Supported Drivers: "local", "ftp", "sftp", "s3", "rackspace" */
    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],
        'files' => [
            'driver' => 's3',
            'region' => 'us-east-1',
            'use_path_style_endpoint' => true,
            'key' => 'ZF9H2EEMVVOAQBSGCAG17',
            'secret' => 'SwiVtMv83KpDY9Sti0Iqf0TaPnnVuwNbdqHikh2Yp',
            'bucket' => 'files',
            'endpoint' => 'https://file.learniaa.com',
        ],
        'learniaa' => [
            'driver' => 's3',
            'region' => 'us-east-1',
            'use_path_style_endpoint' => true,
            'key' => 'ZF9H2EEMVVOAQBSGCAG17',
            'secret' => 'SwiVtMv83KpDY9Sti0Iqf0TaPnnVuwNbdqHikh2Yp',
            'bucket' => 'learniaa',
            'endpoint' => 'https://file.learniaa.com',
        ],
    ],
];
