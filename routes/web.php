<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProvinsiController;


/*
|--------------------------------------------------------------------------
@@ -14,5 +16,40 @@
*/


// ...
// routes/web.php


// Add other routes as needed

// Ini Udah yaaa
use App\Http\Controllers\AdminProvinsiManajemenKabKota;

Route::get('/manajemen-kab-kota', [AdminProvinsiManajemenKabKota::class, 'manajemenKabKota'])->name('admin.manajemenKabKota');
Route::post('/tambah-data-admin', [AdminProvinsiManajemenKabKota::class, 'tambahDataAdmin'])->name('admin.tambahDataAdmin');
Route::post('/admin/hapusDataAdmin/{id}', [AdminProvinsiManajemenKabKota::class, 'hapusDataAdmin'])->name('admin.hapusDataAdmin');
Route::get('/admin/editDataAdmin/{id}', [AdminProvinsiManajemenKabKota::class, 'editDataAdmin'])->name('admin.editDataAdmin');
Route::put('/admin/updateDataAdmin/{id}', [AdminProvinsiManajemenKabKota::class, 'updateDataAdmin'])->name('admin.updateDataAdmin');

use App\Http\Controllers\Auth\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin_provinsi_dashboard', function () {
    return view('admin_provinsi_dashboard');
});

// Yang di Atas Ini Udah yaaa
// File: routes/web.php


Route::get('/admin_provinsi/dashboard', [AdminProvinsiController::class, 'showDashboard'])
    ->name('dashboardAdminProvinsi');


Route::get('/', function () {
    return view('welcome');
});
Route::get('/tes', function () {
    return view('admin_provinsi_manajemenkabkota');
});
