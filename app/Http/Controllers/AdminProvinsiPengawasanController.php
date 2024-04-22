<?php

namespace App\Http\Controllers;

use App\Models\Dps;
use App\Models\PemilihanDps;
use Illuminate\Http\Request;
use App\Models\ProsesKonversi;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProvinsiPengawasanController extends Controller
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
        return view('admin_provinsi_pengawasandps', compact('dps', 'jumlahKoperasi'));
    }
    public function proses_konversi()
    {
        // Ambil data proses konversi koperasi
        $prosesKonversi = ProsesKonversi::all();

        return view('admin_provinsi_konversikoperasi', compact('prosesKonversi'));
    }
    public function menampilkanDataPengawasanKoperasi($id_dps)
    {
        // Ambil data koperasi yang memilih DPS dari model PemilihanDps berdasarkan ID DPS yang diklik
        $pemilihanDps = PemilihanDps::with(['koperasi' => function ($query) {
            $query->select('id_koperasi', 'nama_koperasi', 'kabupaten_kota');
        }])
            ->where('id_dps', $id_dps)
            ->orderBy('tanggal_dipilih', 'desc') // Urutkan berdasarkan tanggal pemilihan terbaru
            ->get();

        return view('detail_pengawasandps_koperasi', compact('pemilihanDps'));
    }
}
