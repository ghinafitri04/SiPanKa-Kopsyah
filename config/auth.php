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

        'admin_provinsi' => [
            'driver' => 'session',
            'provider' => 'admin_provinsi',
        ],

        'admin_kabupatenkota' => [
            'driver' => 'session',
            'provider' => 'admin_kabupatenkota',
        ],

        'koperasi' => [
            'driver' => 'session',
            'provider' => 'koperasi',
        ],

        'dps' => [
            'driver' => 'session',
            'provider' => 'dps',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\AdminProvinsi::class,

        ],

        'admin_provinsi' => [
            'driver' => 'eloquent',
            'model' => App\Models\AdminProvinsi::class,
        ],

        'admin_kabupatenkota' => [
            'driver' => 'eloquent',
            'model' => App\Models\AdminKabupatenKota::class,
        ],

        'koperasi' => [
            'driver' => 'eloquent',
            'model' => App\Models\Koperasi::class,
        ],

        'dps' => [
            'driver' => 'eloquent',
            'model' => App\Models\Dps::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets', // Sesuaikan sesuai tabel reset password untuk model AdminProvinsi
            'expire' => 60,
            'throttle' => 60,
        ],

        'admin_provinsi' => [
            'provider' => 'admin_provinsi',
            'table' => 'password_resets', // Sesuaikan sesuai tabel reset password untuk model AdminProvinsi
            'expire' => 60,
            'throttle' => 60,
        ],

        'admin_kabupatenkota' => [
            'provider' => 'admin_kabupatenkota',
            'table' => 'password_resets', // Sesuaikan sesuai tabel reset password untuk model AdminKabupatenKota
            'expire' => 60,
            'throttle' => 60,
        ],

        'koperasi' => [
            'provider' => 'koperasi',
            'table' => 'password_resets', // Sesuaikan sesuai tabel reset password untuk model Koperasi
            'expire' => 60,
            'throttle' => 60,
        ],

        'dps' => [
            'provider' => 'dps',
            'table' => 'password_resets', // Sesuaikan sesuai tabel reset password untuk model DPS
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
