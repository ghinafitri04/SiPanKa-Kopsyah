<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProvinsiController;
use App\Http\Controllers\AdminProvinsiManajemenKabKota;


/*
|--------------------------------------------------------------------------
@@ -14,5 +16,40 @@
*/





Route::get('/admin_provinsi_dashboard', function () {
    return view('admin_provinsi_dashboard');
});

// File: routes/web.php


Route::get('/admin_provinsi/dashboard', [AdminProvinsiController::class, 'showDashboard'])
    ->name('dashboardAdminProvinsi');

Route::get('/admin/provinsi/manajemenkabkota', [AdminProvinsiManajemenKabKota::class, 'manajemenKabKota'])
    ->name('admin_provinsi.login');


Route::get('/', function () {
    return view('welcome');
});
Route::get('/tes', function () {
    return view('admin_provinsi_manajemenkabkota');
});



use App\Http\Controllers\Auth\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
