<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminProvinsiController;
use App\Http\Controllers\AdminKabupatenKotaController;
use App\Http\Controllers\AdminProvinsiManajemenKabKotaController;
use App\Http\Controllers\AdminProvinsiManajemenDpsController;
use App\Http\Controllers\AdminProvinsiManajemenKoperasiController;
use App\Http\Controllers\AdminProvinsiPengawasanController;

use App\Http\Controllers\AdminKabupatenKotaManajemenKoperasiController;
use App\Http\Controllers\AdminKabupatenKotaKonversiKoperasiController;
use App\Http\Controllers\AdminKabupatenKotaPengawasanDpsController;

use App\Http\Controllers\KoperasiController;
use App\Http\Controllers\KoperasiProfileController;
use App\Http\Controllers\KoperasiPemilihanDpsController;
use App\Http\Controllers\ManajemenKoperasiController;
use App\Http\Controllers\DpsController;
use App\Http\Controllers\PemilihanDpsController;
use App\Http\Controllers\AdminKabKotaManajemenKoperasiController;
use App\Http\Controllers\ProsesKonversiController;

use App\Http\Controllers\DpsInformasiKoperasiController;
use App\Http\Controllers\DpsPengawasanKoperasiController;
use App\Http\Controllers\DpsProfileController;
use App\Models\Koperasi;
use App\Http\Controllers\AdminKoperasiController;
use App\Models\AdminProvinsi;
use App\Models\PemilihanDps;

// Route default, arahkan ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});




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
    Route::delete('/admin-provinsi/manajemen-dps/{id}', [AdminProvinsiManajemenDpsController::class, 'destroy'])
        ->name('admin_provinsi.manajemen_dps.destroy');
    Route::get('/admin-provinsi/manajemen-dps/{id}/edit', [AdminProvinsiManajemenDpsController::class, 'edit'])
        ->name('admin_provinsi.manajemen_dps.edit');
    Route::put('/admin-provinsi/manajemen-dps/{id}', [AdminProvinsiManajemenDpsController::class, 'update'])
        ->name('admin_provinsi.manajemen_dps.update');
    Route::get('/sertifikat/{filename}', function ($filename) {
        $path = storage_path('app/sertifikat/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }
        return response()->file($path);
    })->name('sertifikat.show');

    Route::get('/admin-provinsi/manajemen-koperasi', [AdminProvinsiManajemenKoperasiController::class, 'index'])
        ->name('admin_provinsi.manajemen_koperasi.index');
    Route::post('/admin-provinsi/manajemen-koperasi', [AdminProvinsiManajemenKoperasiController::class, 'store'])
        ->name('admin_provinsi.manajemen_koperasi.store');
    Route::delete('/admin-provinsi/manajemen-koperasi/{id}', [AdminProvinsiManajemenKoperasiController::class, 'destroy'])
        ->name('admin_provinsi.manajemen_koperasi.destroy');
    Route::get('/admin-provinsi/manajemen-koperasi/{id}/edit', [AdminProvinsiManajemenKoperasiController::class, 'edit'])
        ->name('admin_provinsi.manajemen_koperasi.edit');
    Route::put('/admin-provinsi/manajemen-koperasi/{id}', [AdminProvinsiManajemenKoperasiController::class, 'update'])
        ->name('admin_provinsi.manajemen_koperasi.update');
    Route::get('/admin-provinsi/detail-manajemen-koperasi/{id}', [AdminProvinsiManajemenKoperasiController::class, 'detail_index'])
        ->name('admin_provinsi.detail_manajemen_koperasi.detail_index');
    Route::get('/admin_provinsi/get_jumlah_koperasi', 'AdminProvinsiManajemenKoperasiController@getJumlahAdminKoperasi')
        ->name('admin_provinsi.get_jumlah_admin_koperasi');
    Route::get('/admin-provinsi/pengawasan', [AdminProvinsiPengawasanController::class, 'menampilkanDataPengawasan'])->name('admin.provinsi.pengawasan');
    Route::get('/konversi-koperasi', [AdminProvinsiPengawasanController::class, 'proses_konversi'])->name('konversikoperasi');
    // Route::get('/{filename}', [AdminProvinsiPengawasanController::class, 'showPDF'])->name('show.pdf');
    Route::get('/rapat_anggota/{filename}', function ($filename) {
        $path = storage_path('app/rapat_anggota/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }
        return response()->file($path);
    })->name('rapat_anggota.pdf');
    Route::get('/perubahan_pad/{filename}', function ($filename) {
        $path = storage_path('app/perubahan_pad/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }
        return response()->file($path);
    })->name('perubahan_pad.pdf');
    Route::get('/bukti_notaris/{filename}', function ($filename) {
        $path = storage_path('app/bukti_notaris/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }
        return response()->file($path);
    })->name('bukti_notaris.img');

    Route::get('/pengesahan_pad/{filename}', function ($filename) {
        $path = storage_path('app/pengesahan_pad/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }
        return response()->file($path);
    })->name('pengesahan_pad.pdf');
    Route::get('/admin-provinsi/pengawasan/koperasi/{id}', [AdminProvinsiPengawasanController::class, 'menampilkanDataPengawasanKoperasi'])
        ->name('provinsi_pengawasan_koperasi');
    Route::get('/admin-provinsi/pengawasan/file/{id}', [AdminProvinsiPengawasanController::class, 'menampilkanFilePengawasan'])
        ->name('provinsi_file_pengawasan');
});

Route::middleware(['auth:admin_kabupatenkota'])->group(function () {
    Route::get('/admin-kabkota/dashboard', [AdminKabupatenKotaController::class, 'dashboard'])
        ->name('admin_kabkota.dashboard');
    Route::get('/admin-kabkota/manajemen-koperasi', [AdminKabupatenKotaManajemenKoperasiController::class, 'index'])
        ->name('admin_kabkota.manajemen_koperasi.index');
    Route::post('/admin-kabkota/manajemen-koperasi/store', [AdminKabupatenKotaManajemenKoperasiController::class, 'store'])
        ->name('admin_kabkota.manajemen_koperasi.store');
    Route::delete('/admin-kabkota/manajemen-koperasi/{id}', [AdminKabupatenKotaManajemenKoperasiController::class, 'destroy'])
        ->name('admin_kabkota.manajemen_koperasi.destroy');
    Route::put('/admin-kabkota/manajemen-koperasi/{id}', [AdminKabupatenKotaManajemenKoperasiController::class, 'update'])
        ->name('admin_kabkota.manajemen_koperasi.update');

    // Route untuk admin kab kota

    Route::get('/admin-kabkota/konversi-koperasi', [AdminKabupatenKotaKonversiKoperasiController::class, 'index'])
        ->name('admin_kabkota.konversi_koperasi.index');
    Route::get('/admin-kabkota/pengawasan-dps', [AdminKabupatenKotaPengawasanDpsController::class, 'menampilkanDataPengawasan'])
        ->name('admin.kabkota.pengawasan');
    Route::get('/admin-kabkota/konversi', [AdminKabupatenKotaPengawasanDpsController::class, 'prosesKonversiKabKota'])
        ->name('admin.kabkota.konversi');
    Route::get('/rapat_anggota/{filename}', function ($filename) {
        $path = storage_path('app/rapat_anggota/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }
        return response()->file($path);
    })->name('rapat_anggota.pdf');
    Route::get('/perubahan_pad/{filename}', function ($filename) {
        $path = storage_path('app/perubahan_pad/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }
        return response()->file($path);
    })->name('perubahan_pad.pdf');
    Route::get('/bukti_notaris/{filename}', function ($filename) {
        $path = storage_path('app/bukti_notaris/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }
        return response()->file($path);
    })->name('bukti_notaris.img');

    Route::get('/pengesahan_pad/{filename}', function ($filename) {
        $path = storage_path('app/pengesahan_pad/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }
        return response()->file($path);
    })->name('pengesahan_pad.pdf');
});



Route::middleware(['auth:koperasi'])->group(function () {
    Route::get('/koperasi/dashboard', [KoperasiController::class, 'dashboard'])
        ->name('koperasi.dashboard');
    Route::get('/koperasi/profile', [KoperasiProfileController::class, 'showProfile'])
        ->name('koperasi.profile');
    Route::post('/koperasi/profile/store', [KoperasiProfileController::class, 'store'])
        ->name('koperasi.profile.store');

    //Pemilihan DPS
    Route::post('/koperasi/pemilihan-dps/store', [KoperasiPemilihanDpsController::class, 'store'])
        ->name('koperasi.pemilihan_dps.store');
    Route::get('/koperasi/pemilihan-dps', [KoperasiPemilihanDpsController::class, 'index'])
        ->name('koperasi.pemilihan_dps.index');
    //Route untuk koperasi proses konversi

    Route::get('/pdf/show/{id}', [ProsesKonversiController::class, 'showPdf'])->name('pdf.show');
    Route::get('/proses-konversi/tahap-1', [ProsesKonversiController::class, 'showFormTahap1'])->name('prosesTahap1');
    Route::post('/proses-konversi/tahap-1', [ProsesKonversiController::class, 'prosesTahap1'])->name('prosesTahap1Submit');
    Route::get('/proses-konversi/tahap-2', [ProsesKonversiController::class, 'showFormTahap2'])->name('prosesTahap2');
    Route::post('/proses-konversi/tahap-2', [ProsesKonversiController::class, 'prosesTahap2'])->name('prosesTahap2Submit');
    Route::put('/proses-konversi/tahap-3', [ProsesKonversiController::class, 'prosesTahap3'])->name('prosesTahap3Update');
    Route::get('/proses-konversi/tahap-3', [ProsesKonversiController::class, 'showFormTahap3'])->name('prosesTahap3');
    Route::post('/proses-konversi/tahap-3', [ProsesKonversiController::class, 'prosesTahap3'])->name('prosesTahap3Submit');
    Route::get('/proses-konversi/tahap-4', [ProsesKonversiController::class, 'showFormTahap4'])->name('prosesTahap4');
    Route::post('/proses-konversi/tahap-4', [ProsesKonversiController::class, 'prosesTahap4'])->name('prosesTahap4Submit');

    Route::get('/rekap-konversi', function () {
        return view('koperasi_tabel_konversi');
    })->name('koperasi.tabelkonversi');

    Route::get('/tahap/{tahap}/preview', function ($tahap) {
        // Mendapatkan path ke dokumen dari storage
        $filePath = storage_path("app/upload_tahap_$tahap/document.pdf");

        // Periksa apakah dokumen ada
        if (!file_exists($filePath)) {
            abort(404);
        }

        // Mengirimkan dokumen sebagai respons dengan tipe konten yang sesuai
        return response()->file($filePath, ['Content-Type' => 'application/pdf']);
    })->name('preview.tahap');
    Route::get('/tahap/{tahap}/preview', function ($tahap) {
        // Mendapatkan path ke dokumen dari storage
        $filePath = storage_path("app/upload_tahap_$tahap/document.pdf");

        // Periksa apakah dokumen ada
        if (!file_exists($filePath)) {
            abort(404);
        }

        // Mengirimkan dokumen sebagai respons dengan tipe konten yang sesuai
        return response()->file($filePath, ['Content-Type' => 'application/pdf']);
    })->name('preview.tahap');
});

Route::middleware(['auth:dps'])->group(function () {
    // Sesuaikan dengan controller dan metodenya
    Route::get('/dps_dashboard', [DpsController::class, 'dashboard'])->name('dps.dashboard');
    Route::get('/dps-informasi-koperasi', [DpsInformasiKoperasiController::class, 'getKoperasi'])
        ->name('dps.informasi.koperasi');
    Route::get('/dps-detail-koperasi/{id}', [DpsInformasiKoperasiController::class, 'show'])
        ->name('dps.detail');
    Route::get('/dps-konversikoperasi/{id}', [DpsPengawasanKoperasiController::class, 'index'])
        ->name('dps_konversi_koperasi');
    Route::get('/dps_pengawasan_koperasi/{id_koperasi}', [DpsPengawasanKoperasiController::class, 'dpsPengawasanKoperasi'])->name('dps_pengawasan_koperasi');
    Route::get('/dps_detail_pengawasan_diterima/{id_koperasi}', [DpsPengawasanKoperasiController::class, 'buatReportBaru'])->name('buat_laporan_baru');
    Route::post('/menambahkan-laporan/{id_koperasi}', [DpsPengawasanKoperasiController::class, 'menambahkanLaporan'])->name('dps.menambahkan-laporan');
    Route::get('/dps-pengawasan-laporan/{id_pengawasan}', [DpsPengawasanKoperasiController::class, 'menampilkanLaporan'])
        ->name('dps.pengawasan_laporan');
    Route::get('/profile-dps', [DpsProfileController::class, 'showProfile'])->name('dps_profile');
    Route::post('/update-profile', [DpsProfileController::class, 'updateProfile'])->name('update_dps_profile');
});


// Route sementara (opsional, bisa dihapus jika tidak digunakan)
Route::get('/admin-dps', function () {
    return view('admin_provinsi_admindps');
})->name('admindps');



Route::get('/detail-pengawasankoperasi', function () {
    return view('detail_pengawasandps_koperasi');
})->name('detail_pengawasandps_koperasi');

Route::get('/detail-dpsditerima', function () {
    return view('detail_pengawasan_dpsditerima');
})->name('detail_pengawasan_dpsditerima');

Route::get('/detail-dpsmenunggu', function () {
    return view('detail_pengawasan_dpsmenunggu');
})->name('detail_pengawasan_dpsmenunggu');

Route::get('/detail-dpsditolak', function () {
    return view('detail_pengawasan_dpsditolak');
})->name('detail_pengawasan_dpsditolak');

Route::get('/konversi-tahap1', function () {
    return view('konversi_koperasi_tahap1');
})->name('konversi_koperasi_tahap1');

Route::get('/konversi-tahap2', function () {
    return view('konversi_koperasi_tahap2');
})->name('konversi_koperasi_tahap2');

Route::get('/konversi-tahap3', function () {
    return view('konversi_koperasi_tahap3');
})->name('konversi_koperasi_tahap3');

Route::get('/konversi-tahap4', function () {
    return view('konversi_koperasi_tahap4');
})->name('konversi_koperasi_tahap4');


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

// Route untuk halaman dps yaa
Route::get('/dps-pengawasandps', function () {
    return view('dps_riwayat_pengawasan');
})->name('dps_riwayat_pengawasan');



Route::get('/detail-pengawasan-dps', function () {
    return view('dps_detail_pengawasan');
})->name('dps_detail_pengawasan');



Route::get('/kabkota-adminkoperasi', function () {
    return view('admin_kabkota_adminkoperasi');
})->name('adminkoperasikabkota');

Route::get('/adminkablota-pengawasan-dps', function () {
    return view('admin_kabkota_pengawasandps');
})->name('pengawasandpskabkota');

Route::get('/detail-pengawasan-dps', function () {
    return view('admin_kabkota_detail_pengawasan_dps');
})->name('detailpengawasandpskabkota');

Route::get('/detail-kabkotapengawasankoperasi', function () {
    return view('admin_kabkota_detail_pengawasandps_koperasi');
})->name('detailpengawasandpskabkota_koperasi');

Route::get('/detail-kabkota-dpsditerima', function () {
    return view('admin_kabkota_detail_pengawasan_dpsditerima');
})->name('detailpengawasandpskabkota_diterima');

Route::get('/detail-kabkota-dpsmenunggu', function () {
    return view('admin_kabkota_detail_pengawasan_dpsmenunggu');
})->name('detailpengawasandpskabkota_menunggu');

Route::get('/detail-kabkota-dpsditolak', function () {
    return view('admin_kabkota_detail_pengawasan_dpsditolak');
})->name('detailpengawasandpskabkota_ditolak');

Route::get('/detail-admin-koperasi-kabkota', function () {
    return view('admin_kabkota_detailadminkoperasi');
})->name('admin_kabkota_detailadminkoperasi');


Route::get('/detail-admin-koperasi-kabkota', function () {
    return view('admin_kabkota_detailadminkoperasi');
})->name('admin_kabkota_detailadminkoperasi');




Route::get('/koperasi-hasil-pengawasan', function () {
    return view('koperasi_hasil_pengawasan');
})->name('hasil.pengawasan.koperasi');

Route::get('/koperasi-hasil-pengawasan2', function () {
    return view('koperasi_hasil_pengawasan2');
})->name('hasil.pengawasan.koperasi2');
