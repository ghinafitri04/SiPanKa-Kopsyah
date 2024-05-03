<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengawasan;
use App\Models\Dps;
use App\Models\Komentar;
use App\Models\PemilihanDps;
use Illuminate\Support\Facades\Auth;

class KoperasiHasilPengawasanController extends Controller
{
    public function index()
    {
        // Ambil ID koperasi yang sedang login
        $koperasi_id = Auth::user()->id_koperasi;

        // Mengambil data pengawasan DPS berdasarkan ID koperasi yang sedang login
        $pengawasan = Pengawasan::where('id_koperasi', $koperasi_id)->get();

        // Mengirim data pengawasan ke view
        return view('koperasi_hasil_pengawasan', compact('pengawasan'));
    }


    public function show($id)
    {
        // Ambil data pengawasan beserta relasi dengan DPS berdasarkan id
        $pengawasan = Pengawasan::with('dps')->find($id);
        $nama_lengkap = null;

        // Jika data pengawasan ditemukan
        if ($pengawasan) {
            // Ambil entri Dps yang sesuai dengan id_dps dalam pengawasan
            $dps = Dps::find($pengawasan->id_dps);

            // Jika entri Dps ditemukan
            if ($dps) {
                // Set $nama_lengkap ke nilai dari atribut nama_lengkap dari entri Dps
                $nama_lengkap = $dps->nama_lengkap;
            }

            // Mengambil semua komentar untuk pengawasan tertentu
            $komentars = Komentar::where('id_pengawasan', $pengawasan->id)->get();
        } else {
            $komentars = collect(); // Jika tidak ada pengawasan, set komentar kosong
        }

        return view('koperasi_hasil_pengawasan2', compact('pengawasan', 'nama_lengkap', 'komentars'));
    }
}
