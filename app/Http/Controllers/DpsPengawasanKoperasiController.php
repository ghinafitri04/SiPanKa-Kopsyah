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
    public function index($id)
    {
        // Ambil data proses konversi koperasi
        $prosesKonversi = ProsesKonversi::where('id_koperasi', $id)->get();

        return view('dps_konversi_koperasi', compact('prosesKonversi'));
    }
    // Di dalam kontroler yang memanggil view ini (misalnya DpsPengawasanKoperasiController)
    public function dpsPengawasanKoperasi($id_koperasi)
    {
        // Mendapatkan ID DPS yang sedang login
        $idDps = auth()->user()->getAuthIdentifier();

        // Ambil data riwayat pengawasan DPS berdasarkan ID koperasi yang dipilih dan ID DPS yang sedang login
        $riwayatPengawasanDPS = Pengawasan::where('id_koperasi', $id_koperasi)
            ->whereHas('dps', function ($query) use ($idDps) {
                $query->where('id', $idDps);
            })
            ->get();

        // Ambil data koperasi berdasarkan ID koperasi
        $koperasi = Koperasi::findOrFail($id_koperasi);

        // Kembalikan view 'dps_detail_pengawasan.blade.php' dengan data riwayat pengawasan DPS dan data koperasi
        return view('dps_detail_pengawasan', compact('riwayatPengawasanDPS', 'koperasi'));
    }



    public function buatReportBaru($id_koperasi)
    {
        $riwayatPengawasanDPS = Pengawasan::where('id_koperasi', $id_koperasi)->get();
        $koperasi = Koperasi::findOrFail($id_koperasi);

        return view('dps_detail_pengawasan_diterima', compact('koperasi'));
    }

    public function menambahkanLaporan(Request $request, $id_koperasi)
    {
        $request->validate([
            'hasil' => 'required|string',
            'permasalahan' => 'required|string',
            'saran' => 'required|string',
        ]);

        // Mengambil ID DPS yang sedang login
        $idDps = auth()->user()->getAuthIdentifier();

        Pengawasan::create([
            'id_admin_provinsi' => 1, // ID admin provinsi tetap 1
            'id_dps' => $idDps,
            'id_koperasi' => $id_koperasi,
            'tanggal_pengawasan' => now(),
            'hasil' => $request->input('hasil'),
            'permasalahan' => $request->input('permasalahan'),
            'saran' => $request->input('saran'),
            'status' => false,
        ]);

        // Menggunakan redirect ke halaman detail pengawasan diterima
        return redirect()->route('dps_pengawasan_koperasi', ['id_koperasi' => $id_koperasi])->with('success', 'Data pengawasan berhasil disimpan.');
    }
    public function menampilkanLaporan($id_pengawasan)
    {
        // Ambil data pengawasan berdasarkan ID pengawasan
        $pengawasan = Pengawasan::findOrFail($id_pengawasan);

        // Kembalikan view 'detail_pengawasan_dpsmenunggu.blade.php' dengan data pengawasan yang sesuai
        return view('dps_detail_pengawasan_menunggu', compact('pengawasan'));
    }
}
