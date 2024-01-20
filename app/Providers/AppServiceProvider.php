<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
    
    protected $guards = [
        'web',
        'admin_koperasi',
        'admin_dps',
        'admin_kabupaten',
        'admin_provinsi',
    ];
    
}

