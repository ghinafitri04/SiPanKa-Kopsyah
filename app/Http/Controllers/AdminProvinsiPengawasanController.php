<?php

namespace App\Http\Controllers;

use App\Models\Dps;
use App\Models\PemilihanDps;
use App\Models\Pengawasan;
use Illuminate\Http\Request;
use App\Models\ProsesKonversi;
use App\Models\Koperasi;
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
    public function menampilkanDataKoperasi($id_dps)
    {
        // Cari pemilihan DPS berdasarkan ID DPS yang diklik
        $pemilihanDps = PemilihanDps::where('id_dps', $id_dps)->get();

        // Buat array kosong untuk menyimpan ID koperasi yang dipilih
        $koperasiIds = [];

        // Loop melalui hasil pemilihan DPS untuk mendapatkan ID koperasi yang dipilih
        foreach ($pemilihanDps as $pemilihan) {
            $koperasiIds[] = $pemilihan->id_koperasi;
        }

        // Ambil data koperasi berdasarkan ID koperasi yang dipilih
        $koperasi = Koperasi::whereIn('id_koperasi', $koperasiIds)->get();

        // Kembalikan view 'dps_informasi_koperasi.blade.php' dengan data koperasi
        return view('admin_provinsi_daftar_koperasi', compact('koperasi'));
    }
    public function menampilkanDataPengawasanKoperasi($id_koperasi)
    {
        // Ambil data pengawasan koperasi berdasarkan ID koperasi yang diklik
        $pengawasan = Pengawasan::with(['koperasi' => function ($query) {
            $query->select('id_koperasi', 'nama_koperasi');
        }])
            ->where('id_koperasi', $id_koperasi)
            ->orderBy('tanggal_pengawasan', 'desc') // Urutkan berdasarkan tanggal pengawasan terbaru
            ->get(['id_dps', 'id_koperasi', 'status', 'tanggal_pengawasan', 'id']);

        return view('detail_pengawasandps_koperasi', compact('pengawasan'));
    }
    public function menampilkanFilePengawasan($id)
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
        }

        return view('admin_provinsi_laporandps', compact('pengawasan', 'nama_lengkap'));
    }


    public function terimaLaporan(Request $request, $id)
    {
        $pengawasan = Pengawasan::find($id);

        if ($pengawasan && ($pengawasan->status !== null || $pengawasan->status !== false)) {
            $pengawasan->status = !$pengawasan->status; // Toggle status
            $pengawasan->save();
        }

        return redirect()->back();
    }
}
