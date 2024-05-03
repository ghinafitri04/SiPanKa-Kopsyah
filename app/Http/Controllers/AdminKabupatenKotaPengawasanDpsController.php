<?php

namespace App\Http\Controllers;

use App\Models\Dps;
use App\Models\PemilihanDps;
use App\Models\ProsesKonversi;
use App\Models\Pengawasan;
use App\Models\Koperasi;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminKabupatenKotaPengawasanDpsController extends Controller
{
    public function menampilkanDataPengawasan()
    {
        // Mendapatkan admin kabupaten atau kota yang sedang login
        $adminKabupatenKota = auth()->user();

        // Inisialisasi array untuk menyimpan jumlah koperasi yang memilih setiap DPS
        $jumlahKoperasi = [];

        // Mendapatkan semua DPS
        $dps = Dps::all();

        // Jika yang login adalah admin kabupaten atau kota

        // Dapatkan ID kabupaten atau kota dari admin tersebut
        $id_kabupatenkota = $adminKabupatenKota->kabupatenKota->id_kabupatenkota;

        // Mengambil jumlah koperasi yang memilih setiap DPS yang terkait dengan admin kabupaten atau kota yang login
        foreach ($dps as $dpsData) {
            // Menghitung jumlah koperasi yang memilih DPS, hanya menghitung satu entri per koperasi
            $jumlahKoperasi[$dpsData->id_dps] = PemilihanDps::where('id_dps', $dpsData->id_dps)
                ->whereIn('id_koperasi', function ($query) use ($id_kabupatenkota) {
                    $query->select('id_koperasi')
                        ->from('koperasi')
                        ->where('id_admin_kabupatenkota', $id_kabupatenkota);
                })
                ->distinct('id_koperasi')
                ->count('id_koperasi');
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

    public function menampilkanDataKoperasi($id_dps)
    {
        // Dapatkan admin kabupaten atau kota yang sedang login
        $adminKabupatenKota = auth()->user();

        // Periksa apakah admin yang login adalah admin kabupaten atau kota
        // Dapatkan ID kabupaten atau kota dari admin tersebut
        $id_kabupatenkota = $adminKabupatenKota->kabupatenKota->id_kabupatenkota;

        // Cari pemilihan DPS berdasarkan ID DPS yang diklik
        $pemilihanDps = PemilihanDps::where('id_dps', $id_dps)->get();

        // Buat array kosong untuk menyimpan ID koperasi yang dipilih
        $koperasiIds = [];

        // Loop melalui hasil pemilihan DPS untuk mendapatkan ID koperasi yang dipilih
        foreach ($pemilihanDps as $pemilihan) {
            $koperasiIds[] = $pemilihan->id_koperasi;
        }

        // Ambil data koperasi berdasarkan ID koperasi yang dipilih dan terkait dengan kabupaten atau kota admin yang login
        $koperasi = Koperasi::whereIn('id_koperasi', $koperasiIds)
            ->where('id_admin_kabupatenkota', $id_kabupatenkota)
            ->get();

        // Kembalikan view 'admin_kabkota_detail_pengawasan_dps.blade.php' dengan data koperasi
        return view('admin_kabkota_detail_pengawasan_dps', compact('koperasi'));
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

        return view('admin_kabkota_detail_pengawasandps_koperasi', compact('pengawasan'));
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

            // Mengambil semua komentar untuk pengawasan tertentu
            $komentars = Komentar::where('id_pengawasan', $pengawasan->id)->get();
        } else {
            $komentars = collect(); // Jika tidak ada pengawasan, set komentar kosong
        }
        return view('admin_kabkota_laporandps', compact('pengawasan', 'nama_lengkap', 'komentars'));
    }
    public function komentarKabkota(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'id_pengawasan' => 'required|exists:pengawasan,id',
            'komentar' => 'required|string',
        ]);

        // Buat komentar baru
        Komentar::create([
            'id_pengawasan' => $request->id_pengawasan,
            'username' => auth()->user()->username,
            'komentar' => $request->komentar,
        ]);

        // Ambil semua komentar terbaru setelah menambahkan komentar baru
        $komentars = Komentar::where('id_pengawasan', $request->id_pengawasan)
            ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan kolom created_at secara descending (dari yang terbaru)
            ->get();

        // Redirect atau berikan respons sukses
        return redirect()->back()->with('success', 'Komentar berhasil dikirim')->with('komentars', $komentars);
    }
}
