<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemilihanDps;
use App\Models\Koperasi;

class DpsInformasiKoperasiController extends Controller
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
}
