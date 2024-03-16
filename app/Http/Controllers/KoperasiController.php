<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koperasi;
use App\Models\AdminKabupatenKota;
use Illuminate\Support\Facades\Storage; // Import class Storage untuk mengelola penyimpanan file

class KoperasiController extends Controller
{
    public function update_profile_koperasi(Request $request, $id)
    {
        // Pastikan $id adalah bilangan bulat sebelum digunakan dalam query
        if (!is_numeric($id)) {
            // Lakukan penanganan kesalahan, contohnya:
            abort(404);
        }

        // Lakukan parameter binding dengan Eloquent untuk mencari koperasi berdasarkan id_koperasi
        $koperasi = Koperasi::findOrFail($id);

        // Tambahkan penanganan jika koperasi tidak ditemukan
        if (!$koperasi) {
            return response()->json(['message' => 'Koperasi not found'], 404);
        }

        $kabupatenKota = null;
        if ($koperasi->id_admin_kabupatenkota) {
            $kabupatenKota = AdminKabupatenKota::with('kabupatenKota')
                ->join('kabupatenkota', 'admin_kabupatenkota.id_kabupatenkota', '=', 'kabupatenkota.id_kabupatenkota')
                ->where('admin_kabupatenkota.id_kabupatenkota', $koperasi->id_admin_kabupatenkota)
                ->select('kabupatenkota.nama_kabupatenkota as nama_kabupatenkota')
                ->first();
        }

        return view('koperasi_update_profile', compact('koperasi', 'kabupatenKota'));
    }

    public function store(Request $request)
    {

        // Validasi data yang diterima dari request
        $request->validate([
            'no_badan_hukum' => 'required|string|max:255',
            'tanggal_badan_hukum' => 'required|date',
            'alamat' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk logo (jenis file gambar)
            'id_admin_kabupatenkota' => 'required' // Pastikan id_admin_kabupatenkota tidak kosong
        ]);

        //disinii model model
        $koperasi = new Koperasi();
        $koperasi->no_badan_hukum = $request->no_badan_hukum;
        $koperasi->tanggal_badan_hukum = $request->tanggal_badan_hukum;
        $koperasi->alamat = $request->alamat;
        $koperasi->kecamatan = $request->kecamatan;
        $koperasi->kelurahan = $request->kelurahan;
        $koperasi->no_telp = $request->no_telp;
        $koperasi->id_admin_kabupatenkota = $request->id_admin_kabupatenkota;
        $koperasi->role = 'koperasi';

        // Simpan file logo ke server jika diunggah
        if ($request->hasFile('logo')) {
            // Simpan file logo ke direktori yang diinginkan di server (misalnya: storage/app/public/logos/)
            $path = $request->file('logo')->store('public/logos');
            // Dapatkan nama file yang disimpan
            $nama_file = basename($path);
            // Set atribut logo ke nama file yang disimpan
            $koperasi->logo = $nama_file;
        }

        // Simpan data ke dalam database
        $koperasi->save();

        // Redirect pengguna ke halaman yang sesuai atau berikan respons
        return redirect()->route('koperasi_update_profile.index')->with('success', 'Data koperasi baru berhasil disimpan');
    }
}
