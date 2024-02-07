<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminProvinsiController;
use App\Http\Controllers\AdminKabupatenKotaController;
use App\Http\Controllers\AdminProvinsiManajemenKabKotaController;

// Route untuk halaman login
Route::get('/login', function () {
    return view('login');
})->name('login');


// Proses login
Route::post('/login', [AuthController::class, 'login']);

// Proses logout
Route::post('/logout', [AuthController::class, 'logout']);

// Route untuk halaman dashboard (untuk semua role)
Route::middleware(['auth:admin_provinsi'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin_provinsi_dashboard')->name('dashboard');
    });

    // Route untuk dashboard admin provinsi
    Route::get('/dashboardAdminProvinsi', [AdminProvinsiController::class, 'dashboard'])
        ->name('dashboardAdminProvinsi');

    // Route untuk manajemen kabupaten/kota
    Route::get('/admin-provinsi/manajemen-kab-kota', [AdminProvinsiManajemenKabKotaController::class, 'index'])
        ->name('admin_provinsi.manajemen_kab_kota.index');
    Route::post('/admin-provinsi/manajemen-kab-kota', [AdminProvinsiManajemenKabKotaController::class, 'store'])
        ->name('admin_provinsi.manajemen_kab_kota.store');
    Route::delete('/admin-provinsi/manajemen-kab-kota/{id}', [AdminProvinsiManajemenKabKotaController::class, 'destroy'])
        ->name('admin_provinsi.manajemen_kab_kota.destroy');
    Route::get('/admin_provinsi/manajemen_kab_kota/{id}/edit', [AdminProvinsiManajemenKabKotaController::class, 'edit'])
        ->name('admin_provinsi.manajemen_kab_kota.edit');
    Route::put('/admin_provinsi/manajemen_kab_kota/{id}', [AdminProvinsiManajemenKabKotaController::class, 'update'])
        ->name('admin_provinsi.manajemen_kab_kota.update');

    // Route untuk halaman detail admin koperasi
    Route::view('/adminkoperasi-detail', 'admin_provinsi_detailadminkoperasi')
        ->name('detail_adminkoperasi');

    // Route sementara (opsional, bisa dihapus jika tidak digunakan)
    Route::get('/admin-dps', function () {
        return view('admin_provinsi_admindps');
    })->name('admindps');

    // Route sementara (opsional, bisa dihapus jika tidak digunakan)
    Route::get('/pengawasan-dps', function () {
        return view('admin_provinsi_pengawasandps');
    })->name('pengawasandps');

    // Route sementara (opsional, bisa dihapus jika tidak digunakan)
    Route::get('/admin-koperasi', function () {
        return view('admin_provinsi_adminkoperasi');
    })->name('adminkoperasi');

    // Route sementara (opsional, bisa dihapus jika tidak digunakan)
    Route::get('/konversi-koperasi', function () {
        return view('admin_provinsi_konversiKoperasi');
    })->name('konversikoperasi');

    // Route untuk halaman detail pengawasan DPS
    Route::view('/detail-dps', 'detail_pengawasan_dps')
        ->name('detail_pengawasan_dps');
});



Route::middleware(['auth:admin_kabupatenkota'])->group(function () {
    // Sesuaikan dengan controller dan metodenya
    Route::get('/admin_kabkota_dashboard', [AdminKabupatenKotaController::class, 'dashboard'])->name('admin_kabupatenkota.dashboard');
});
