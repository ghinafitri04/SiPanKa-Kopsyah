<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Koperasi;
use App\Models\AdminKabupatenKota;

class KoperasiProfileController extends Controller
{
    public function showProfile()
    {
        // Ambil data koperasi yang sedang login
        $koperasi = Auth::user();

        // Jika data koperasi tidak ditemukan
        if (!$koperasi) {
            // Kembalikan pesan bahwa data koperasi tidak ditemukan
            return "Data koperasi tidak ditemukan.";
        }

        // Ambil data kabupaten/kota terkait koperasi menggunakan relasi yang telah didefinisikan di model
        $kabupatenKota = $koperasi->adminKabupatenKota->kabupatenKota;

        // Jika data kabupaten/kota tidak ditemukan
        if (!$kabupatenKota) {
            // Kembalikan pesan bahwa data kabupaten/kota tidak ditemukan
            return "Data kabupaten/kota tidak ditemukan.";
        }

        // Load view koperasi_update_profile sambil kirim data koperasi dan kabupaten/kota
        return view('koperasi_update_profile', ['koperasi' => $koperasi, 'kabupatenKota' => $kabupatenKota]);
    }
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'id' => 'required|exists:koperasi,id_koperasi',
            // Tambahkan validasi sesuai dengan kebutuhan untuk setiap field
            'no_badan_hukum' => 'nullable|string|max:255',
            'tanggal_badan_hukum' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'kelurahan' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:20',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Contoh validasi untuk file gambar
        ]);

        // Cari data koperasi berdasarkan ID
        $koperasi = Koperasi::findOrFail($request->id);

        // Simpan data yang diunggah
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $koperasi->logo = $logoPath;
        }

        // Simpan data lainnya
        $koperasi->no_badan_hukum = $request->no_badan_hukum;
        $koperasi->tanggal_badan_hukum = $request->tanggal_badan_hukum;
        $koperasi->alamat = $request->alamat;
        $koperasi->kecamatan = $request->kecamatan;
        $koperasi->kelurahan = $request->kelurahan;
        $koperasi->no_telp = $request->no_telp;

        // Simpan perubahan
        $koperasi->save();

        // Redirect ke halaman profile dengan pesan sukses
        return redirect()->route('koperasi.profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
