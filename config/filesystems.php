<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw'=> false,
        ],

        'teachers' => [
            'driver' => 'local',
            'root' => storage_path().'public/images/teachers',
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
       
        'cars' => [
            'driver' => 'local',
            'root' => base_path().'public/images/cars',
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        'categories' => [
            'driver' => 'local',
            'root' => base_path().'public/images/categories',
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        'driver' => [
            'driver' => 'local',
            'root' => base_path().'public/images/driver',
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        'procedures' => [
            'driver' => 'local',
            'root' => base_path().'public/images/driver/procedures',
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        'license' => [
            'driver' => 'local',
            'root' => base_path().'public/images/driver/license',
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        'driverFollow' => [
            'driver' => 'local',
            'root' => base_path().'public/images/driverFollow',
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        'proceduresDriverFollow' => [
            'driver' => 'local',
            'root' => base_path().'public/images/driverFollow/procedures',
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        'carPart' => [
            'driver' => 'local',
            'root' => base_path().'public/images/carParts',
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        'covers' => [
            'driver' => 'local',
            'root' => base_path().'public/images/carParts/covers',
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
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
