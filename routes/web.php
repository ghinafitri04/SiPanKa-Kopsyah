<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminProvinsiLoginController;
use App\Http\Controllers\AdminProvinsiController;
use App\Http\Controllers\AdminProvinsiManajemenKabKota;


/*
|--------------------------------------------------------------------------
@@ -14,5 +16,40 @@
*/





Route::prefix('admin_provinsi')->group(function () {

    Route::post('/login', [AdminProvinsiLoginController::class, 'login']);
    Route::post('/logout', [AdminProvinsiLoginController::class, 'logout'])->name('admin_provinsi.logout');
    Route::get('/admin_provinsi/login', [AdminProvinsiLoginController::class, 'showLoginForm'])->name('admin_provinsi.login');

});

// File: routes/web.php


Route::get('/admin_provinsi/dashboard', [AdminProvinsiController::class, 'showDashboard'])
    ->name('dashboardAdminProvinsi');

Route::get('/admin/provinsi/manajemenkabkota', [AdminProvinsiManajemenKabKota::class, 'manajemenKabKota'])
->name('admin_provinsi.login');


    Route::get('/', function () {
        return view('welcome');
        return view('landing');
    });
    
     
