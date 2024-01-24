<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminProvinsiLoginController;
use App\Http\Controllers\AdminProvinsiController;

/*
|--------------------------------------------------------------------------
@@ -15,6 +17,46 @@
*/

Route::get('/', function () {
    return view('dashboard');
});
Route::resource('user', [UserController::class]);
    return view('landing');

// Admin Koperasi Authentication Routes
Route::prefix('admin_koperasi')->group(function () {
    Route::get('/login', 'Auth\AdminKoperasiLoginController@showLoginForm')->name('admin_koperasi.login');
    Route::post('/login', 'Auth\AdminKoperasiLoginController@login');
});

// Admin DPS Authentication Routes
Route::prefix('admin_dps')->group(function () {
    Route::get('/login', 'Auth\AdminDPSLoginController@showLoginForm')->name('admin_dps.login');
    Route::post('/login', 'Auth\AdminDPSLoginController@login');
});

// Admin Kabupaten Authentication Routes
Route::prefix('admin_kabupaten')->group(function () {
    Route::get('/login', 'Auth\AdminKabupatenLoginController@showLoginForm')->name('admin_kabupaten.login');
    Route::post('/login', 'Auth\AdminKabupatenLoginController@login');
});



// Admin Provinsi Authentication Routes
Route::prefix('admin_provinsi')->group(function () {

    Route::post('/login', [AdminProvinsiLoginController::class, 'login']);
    Route::post('/logout', [AdminProvinsiLoginController::class, 'logout'])->name('admin_provinsi.logout');
    Route::get('/admin_provinsi/login', [AdminProvinsiLoginController::class, 'showLoginForm'])->name('admin_provinsi.login');

});

// File: routes/web.php


Route::get('/admin_provinsi/dashboard', [AdminProvinsiController::class, 'showDashboard'])
    ->name('dashboardAdminProvinsi');

