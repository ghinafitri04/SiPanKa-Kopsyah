<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemilihanDps;
use App\Models\Koperasi;
use App\Models\ProsesKonversi; // Perhatikan namespace yang benar
use App\Models\Pengawasan;

class DpsPengawasanKoperasiController extends Controller
{
    public function getKoperasi(Request $request)
    {
        // Ambil ID DPS dari DPS yang sedang login
        $idDps = auth()->user()->getAuthIdentifier();

        // Cari pemilihan DPS yang terkait dengan DPS yang sedang login
        $pemilihanDps = PemilihanDps::where('id_dps', $idDps)->get();

        // Buat array kosong untuk menyimpan ID koperasi yang dipilih
        $koperasiIds = [];

        // Loop melalui hasil pemilihan DPS untuk mendapatkan ID koperasi yang dipilih
        foreach ($pemilihanDps as $pemilihan) {
            $koperasiIds[] = $pemilihan->id_koperasi;
        }

        // Ambil data koperasi berdasarkan ID koperasi yang dipilih
        $koperasi = Koperasi::whereIn('id_koperasi', $koperasiIds)->get();

        // Kembalikan view 'dps_informasi_koperasi.blade.php' dengan data koperasi
        return view('dps_informasi_koperasi', compact('koperasi'));
    }
    public function show($id)
    {
        // Ambil data koperasi berdasarkan ID koperasi
        $koperasi = Koperasi::with('adminKabupatenKota.kabupatenKota')->findOrFail($id);

        // Kembalikan view 'dps_detail_koperasi.blade.php' dengan data koperasi
        return view('dps_detail_koperasi', compact('koperasi'));
    }
    public function index()
    {
        // Ambil data proses konversi koperasi
        $prosesKonversi = ProsesKonversi::all();

        return view('dps_konversi_koperasi', compact('prosesKonversi'));
    }
    public function dpsPengawasanKoperasi($id_koperasi)
    {
        // Ambil data riwayat pengawasan DPS berdasarkan ID koperasi yang dipilih
        $riwayatPengawasanDPS = Pengawasan::where('id_koperasi', $id_koperasi)->get();

        // Kembalikan view 'dps_detail_pengawasan.blade.php' dengan data riwayat pengawasan DPS
        return view('dps_detail_pengawasan', compact('riwayatPengawasanDPS'));
    }
}
