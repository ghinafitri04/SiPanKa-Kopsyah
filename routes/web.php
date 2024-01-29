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

use App\Http\Controllers\AdminManajemenKoperasiController;

Route::get('/manajemen-koperasi', [AdminManajemenKoperasiController::class, 'manajemenKoperasi'])->name('admin.manajemenKoperasi');
Route::post('/tambah-admin-koperasi', [AdminManajemenKoperasiController::class, 'tambahDataAdminKoperasi'])->name('admin.tambahDataAdminKoperasi');
Route::delete('/hapus-admin-koperasi/{id}', [AdminManajemenKoperasiController::class, 'hapusDataAdminKoperasi'])->name('admin.hapusDataAdminKoperasi'); // Ganti menjadi DELETE
Route::get('/edit-admin-koperasi/{id}', [AdminManajemenKoperasiController::class, 'editDataAdminKoperasi'])->name('admin.editDataAdminKoperasi');
Route::put('/update-admin-koperasi/{id}', [AdminManajemenKoperasiController::class, 'updateDataAdminKoperasi'])->name('admin.updateDataAdminKoperasi');

use App\Http\Controllers\AdminProvinsiManajemenDpsController;

Route::get('/admin/manajemenDps', [AdminProvinsiManajemenDpsController::class, 'manajemenDps'])->name('admin.manajemenDps');
Route::post('/admin/manajemenDps', [AdminProvinsiManajemenDpsController::class, 'tambahDataAdminDps'])->name('admin.manajemenDps.tambah');
Route::delete('/admin/manajemenDps/{id}', [AdminProvinsiManajemenDpsController::class, 'hapusDataAdminDps'])->name('admin.manajemenDps.hapus');
Route::get('/admin/manajemenDps/{id}/edit', [AdminProvinsiManajemenDpsController::class, 'editDataAdminDps'])->name('admin.manajemenDps.edit');
Route::put('/admin/manajemenDps/{id}', [AdminProvinsiManajemenDpsController::class, 'updateDataAdminDps'])->name('admin.manajemenDps.update');



// Yang di Atas Ini Udah yaaa


Route::get('/admin_provinsi_dashboard', function () {
    return view('admin_provinsi_dashboard');
});

// File: routes/web.php




Route::get('/', function () {
    return view('welcome');
});
Route::get('/tes', function () {
    return view('admin_provinsi_manajemenkabkota');
});
