<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\AdminProvinsiController;
use App\Http\Controllers\AdminKabupatenKotaController;
use App\Http\Controllers\AdminProvinsiManajemenKabKotaController;
use App\Http\Controllers\AdminProvinsiManajemenDpsController;
use App\Http\Controllers\ManajemenKoperasiController;


// Route untuk halaman login
Route::get('/login', function () {
    return view('login');
})->name('login');


// Proses login
Route::post('/login', [AuthController::class, 'login']);

// Proses logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route untuk halaman dashboard (untuk semua role)
Route::middleware(['auth:admin_provinsi'])->group(function () {
    Route::get('/dashboardAdminProvinsi', [AdminProvinsiController::class, 'dashboard'])->name('dashboardAdminProvinsi');
    
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
        Route::get('/admin_provinsi/get_jumlah_admin_kabupaten_kota', 'AdminProvinsiManajemenKabKotaController@getJumlahAdminKabupatenKota')
        ->name('admin_provinsi.get_jumlah_admin_kabupaten_kota');

        
      // Route untuk manajemen DPS
      Route::get('/admin-provinsi/manajemen-dps', [AdminProvinsiManajemenDpsController::class, 'index'])
      ->name('admin_provinsi.manajemen_dps.index');
  Route::post('/admin-provinsi/manajemen-dps', [AdminProvinsiManajemenDpsController::class, 'store'])
      ->name('admin_provinsi.manajemen_dps.store');
  Route::get('/admin-provinsi/manajemen-dps/{id}/edit', [AdminProvinsiManajemenDpsController::class, 'edit'])
      ->name('admin_provinsi.manajemen_dps.edit');
      Route::delete('/admin-provinsi/manajemen-dps/{id}', [AdminProvinsiManajemenDpsController::class, 'destroy'])
      ->name('admin_provinsi.manajemen_dps.destroy');
  Route::put('/admin-provinsi/manajemen-dps/{id}', [AdminProvinsiManajemenDpsController::class, 'update'])
      ->name('admin_provinsi.manajemen_dps.update');
  Route::get('/sertifikat/{filename}', function ($filename) {
      $path = storage_path('app/sertifikat/' . $filename);

      if (!File::exists($path)) {
          abort(404);
      }

      return response()->file($path);
  })->name('sertifikat.show');
  Route::get('/admin_provinsi/get_jumlah_admin_dps', 'AdminProvinsiManajemenDpsController@getJumlahAdminDps')
  ->name('admin_provinsi.get_jumlah_admin_dps');
    });

  // Route untuk manajemen Koperasi
  // Rute untuk menampilkan halaman manajemen koperasi
  Route::get('/manajemen-koperasi', [ManajemenKoperasiController::class, 'index'])->name('manajemen_koperasi.index');

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

    // Route sementara (opsional untuk kab kota, bisa dihapus jika tidak digunakan)
    Route::get('/pengawasan-dpskabkota', function () {
        return view('admin_kabkota_pengawasandps');
    })->name('pengawasandpskabkota');

    // Route sementara (opsional untuk kab kota di detail dpsnya , bisa dihapus jika tidak digunakan)
    Route::get('/detail-dps-kabkota', function () {
        return view('admin_kabkota_detail_pengawasan_dps');
    })->name('detailpengawasandpskabkota');

    // Route sementara (opsional untuk kab kota untuk list list koperasinya yaa  , bisa dihapus jika tidak digunakan)
    Route::get('/detail-kabkotapengawasankoperasi', function () {
        return view('admin_kabkota_detail_pengawasandps_koperasi');
    })->name('detailpengawasandpskabkota_koperasi');

    Route::get('/detail-kabkota-dpsditerima', function () {
        return view('admin_kabkota_detail_pengawasan_dpsditerima');
    })->name('detailpengawasandps_diterima');

    Route::get('/detail-kabkota-dpsmenunggu', function () {
        return view('admin_kabkota_detail_pengawasan_dpsmenunggu');
    })->name('detailpengawasandps_menunggu');
    
    Route::get('/detail-kabkota-dpsditolak', function () {
        return view('admin_kabkota_detail_pengawasan_dpsditolak');
    })->name('detailpengawasandps_ditolak');

    // Route sementara (opsional, bisa dihapus jika tidak digunakan)
    Route::get('/admin-koperasi', function () {
        return view('admin_provinsi_adminkoperasi');
    })->name('adminkoperasi');

    // Route sementara yang versi admin  koperasi kab kota yaa (opsional, bisa dihapus jika tidak digunakan)
    Route::get('/admin-koperasikabkota', function () {
        return view('admin_kabkota_adminkoperasi');
    })->name('adminkoperasikabkota');

    Route::get('/detail-admin-koperasi-kabkota', function () {
        return view('admin_kabkota_detailadminkoperasi');
    })->name('kabkota_detailadminkoperasi');


    // Route sementara (opsional, bisa dihapus jika tidak digunakan)
    Route::get('/konversi-koperasi', function () {
        return view('admin_provinsi_konversiKoperasi');
    })->name('konversikoperasi');

    // Route sementara untuk kabkota (opsional, bisa dihapus jika tidak digunakan)
    Route::get('/konversi-koperasikabkota', function () {
        return view('admin_kabkota_konversikoperasi');
    })->name('konversikoperasikabkota');

    Route::get('/adminkabkota-konversi-tahap1', function () {
        return view('admin_kabkota_konversi_koperasi_tahap1');
    })->name('tahap1_konversikoperasikabkota');

    Route::get('/adminkabkota-konversi-tahap2', function () {
        return view('admin_kabkota_konversi_koperasi_tahap2');
    })->name('tahap2_konversikoperasikabkota');

    Route::get('/adminkabkota-konversi-tahap3', function () {
        return view('admin_kabkota_konversi_koperasi_tahap3');
    })->name('tahap3_konversikoperasikabkota');

    Route::get('/adminkabkota-konversi-tahap4', function () {
        return view('admin_kabkota_konversi_koperasi_tahap4');
    })->name('tahap4_konversikoperasikabkota');



    // Route untuk halaman detail pengawasan DPS
    Route::view('/detail-dps', 'detail_pengawasan_dps')
        ->name('detail_pengawasan_dps');

    


Route::middleware(['auth:admin_kabupatenkota'])->group(function () {
    // Sesuaikan dengan controller dan metodenya
    Route::get('/admin_kabkota_dashboard', [AdminKabupatenKotaController::class, 'dashboard'])->name('admin_kabupatenkota.dashboard');
});
