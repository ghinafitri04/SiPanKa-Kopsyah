<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin_koperasi' => [
            'driver' => 'session',
            'provider' => 'admin_koperasis',
        ],
        'admin_dps' => [
            'driver' => 'session',
            'provider' => 'admin_dps',
        ],
        'admin_kabupaten' => [
            'driver' => 'session',
            'provider' => 'admin_kabupatens',
        ],
        'admin_provinsi' => [
            'driver' => 'session',
            'provider' => 'admin_provinsi',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'admin_koperasis' => [
            'driver' => 'eloquent',
            'model' => App\Models\AdminKoperasi::class,
        ],
        'admin_dps' => [
            'driver' => 'eloquent',
            'model' => App\Models\AdminDPS::class,
        ],
        'admin_kabupatens' => [
            'driver' => 'eloquent',
            'model' => App\Models\AdminKabupaten::class,
        ],
        'admin_provinsi' => [
            'driver' => 'eloquent',
            'model' => App\Models\AdminProvinsi::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
