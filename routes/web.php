<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminProvinsiLoginController;
use App\Http\Controllers\AdminProvinsiController;
use App\Http\Controllers\AdminProvinsiManajemenKabKota;


/*
|--------------------------------------------------------------------------
@@ -14,5 +16,40 @@
*/

<<<<<<< HEAD




Route::prefix('admin_provinsi')->group(function () {

    Route::post('/login', [AdminProvinsiLoginController::class, 'login']);
    Route::post('/logout', [AdminProvinsiLoginController::class, 'logout'])->name('admin_provinsi.logout');
    Route::get('/admin_provinsi/login', [AdminProvinsiLoginController::class, 'showLoginForm'])->name('admin_provinsi.login');

=======
Route::get('/admin_provinsi_dashboard', function () {
    return view('admin_provinsi_dashboard');
>>>>>>> fa1054ad0f5a7964a74bb62375e498ca883eded3
});

// File: routes/web.php


Route::get('/admin_provinsi/dashboard', [AdminProvinsiController::class, 'showDashboard'])
    ->name('dashboardAdminProvinsi');

Route::get('/admin/provinsi/manajemenkabkota', [AdminProvinsiManajemenKabKota::class, 'manajemenKabKota'])
<<<<<<< Updated upstream
->name('admin_provinsi.login');

<<<<<<< HEAD
=======
    ->name('manajemenKabKota');

Route::view('/admin-dps', 'admin_provinsi_admindps')->name('admindps');

Route::view('/pengawasan-dps', 'admin_provinsi_pengawasandps')->name('pengawasandps');

Route::view('/admin-koperasi', 'admin_provinsi_adminkoperasi')->name('adminkoperasi');

Route::view('/konversi-koperasi', 'admin_provinsi_konversikoperasi')->name('konversikoperasi');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin_provinsi_dashboard');
});

Route::get('/ya', function () {
    return view('admin_provinsi_dashboard');
});

Route::get('/coba', function () {
    return view('admin_kabkota_dashboard');
});


>>>>>>> Stashed changes

    Route::get('/', function () {
        return view('welcome');
        return view('landing');
    });
    
     
=======
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

use App\Http\Controllers\Auth\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
>>>>>>> fa1054ad0f5a7964a74bb62375e498ca883eded3
