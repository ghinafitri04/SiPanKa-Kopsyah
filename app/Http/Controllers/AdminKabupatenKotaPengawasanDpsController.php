<?php

namespace App\Http\Controllers;

use App\Models\Dps;
use App\Models\PemilihanDps;
use App\Models\ProsesKonversi;
use App\Models\AdminKabupatenKota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminKabupatenKotaPengawasanDpsController extends Controller
{
    public function menampilkanDataPengawasan()
    {
        // Mengambil semua DPS
        $dps = Dps::all();

        // Inisialisasi array untuk menyimpan jumlah koperasi yang memilih setiap DPS
        $jumlahKoperasi = [];

        // Mengambil jumlah koperasi yang memilih setiap DPS
        foreach ($dps as $dpsData) {
            // Menghitung jumlah koperasi yang memilih DPS, hanya menghitung satu entri per koperasi
            $jumlahKoperasi[$dpsData->id_dps] = PemilihanDps::where('id_dps', $dpsData->id_dps)->distinct('id_koperasi')->count('id_koperasi');
        }

        // Menampilkan view dengan data DPS dan jumlah koperasi
        return view('admin_kabkota_pengawasandps', compact('dps', 'jumlahKoperasi'));
    }

    public function prosesKonversiKabKota()
{
    // Mendapatkan id_admin_kabupatenkota yang sedang login
    $id_admin_kabupatenkota = Auth::id();

    // Mengambil daftar proses konversi koperasi berdasarkan id_admin_kabupatenkota
    $prosesKonversiList = ProsesKonversi::whereHas('koperasi', function ($query) use ($id_admin_kabupatenkota) {
        $query->where('id_admin_kabupatenkota', $id_admin_kabupatenkota);
    })->get();

    // $prosesKonversi = ProsesKonversi::all();


    return view('admin_kabkota_konversikoperasi', compact('prosesKonversiList'));
    // return view('cobaangga', compact('prosesKonversi'));
}
 
}

