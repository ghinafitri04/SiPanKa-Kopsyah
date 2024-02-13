<?php

namespace App\Http\Controllers;

use App\Models\Dps;
use Illuminate\Http\Request;

class AdminProvinsiManajemenDpsController extends Controller
{
    public function index()
    {
        $dpsList = Dps::all();
        $jumlahAdminDps = \App\Models\Dps::count(); // Hitung jumlah admin kabupaten/kota

          // Simpan nilai dalam sesi
          session()->put('jumlahAdminDps',  $jumlahAdminDps);
    
          return view('admin_provinsi_manajemendps', compact('dpsList', 'jumlahAdminDps'));
    }

    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'username' => 'required|unique:dps',
            'password' => 'required',
            'nama_lengkap' => 'required',
            'kontak' => 'required',
            'alamat' => 'required',
            'sertifikat' => 'required|mimes:pdf',
            // Hapus validasi role karena nilainya sudah ditetapkan secara manual
        ]);

        // Simpan file sertifikat
        $sertifikatPath = $request->file('sertifikat')->store('sertifikat');

        // Simpan data DPS ke dalam database
        $dps = new Dps();
        $dps->username = $request->username;
        $dps->password = bcrypt($request->password); // Simpan versi terenkripsi dari password
        $dps->password_text = $request->password; // Simpan versi teks biasa dari password
        $dps->nama_lengkap = $request->nama_lengkap;
        $dps->kontak = $request->kontak;
        $dps->alamat = $request->alamat;
        $dps->sertifikat = $sertifikatPath; // Simpan path sertifikat
        $dps->role = "dps"; // Ambil nilai role dari inputan form
        $dps->id_admin_provinsi = 1; // Tetapkan nilai 1 untuk id_admin_provinsi
        $dps->save();

        // Redirect ke halaman yang sesuai setelah berhasil menyimpan
        return redirect()->route('admin_provinsi.manajemen_dps.index')->with('success', 'Data DPS berhasil ditambahkan.');
    }


    public function update(Request $request, $id)
    {
        // Validasi input data
        $request->validate([
            'username' => 'required|unique:dps,username,' . $id . ',id_dps',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        try {
            // Cari DPS berdasarkan ID
            $dps = Dps::findOrFail($id);

            // Update data DPS
            $dps->username = $request->username;
            if ($request->filled('password')) {
                $dps->password = bcrypt($request->password);
                $dps->password_text = $request->password; // Simpan versi teks biasa dari password
            }
            // tambahkan atribut lainnya jika ada
            $dps->save();

            // Redirect ke halaman indeks dengan pesan sukses
            return redirect()->route('admin_provinsi.manajemen_dps.index')->with('success', 'Data DPS berhasil diperbarui.');
        } catch (\Exception $e) {
            // Tangani kesalahan dengan menampilkan pesan gagal
            return redirect()->route('admin_provinsi.manajemen_dps.index')->with('error', 'Gagal memperbarui data DPS.');
        }
    }


    public function destroy($id)
    {
        try {
            // Cari DPS berdasarkan ID
            $dps = Dps::findOrFail($id);

            // Hapus DPS
            $dps->delete();

            // Redirect ke halaman indeks dengan pesan sukses
            return redirect()->route('admin_provinsi.manajemen_dps.index')->with('success', 'Data DPS berhasil dihapus.');
        } catch (\Exception $e) {
            // Tangani kesalahan dengan menampilkan pesan gagal
            return redirect()->route('admin_provinsi.manajemen_dps.index')->with('error', 'Gagal menghapus data DPS.');
        }
    }

    public function edit($id)
    {
        try {
            // Cari DPS berdasarkan ID
            $dps = Dps::findOrFail($id);

            return view('admin_provinsi.manajemen_dps.edit', compact('dps'));
        } catch (\Exception $e) {
            // Tangani kesalahan dengan menampilkan pesan gagal
            return redirect()->route('admin_provinsi.manajemen_dps.index')->with('error', 'Gagal memuat halaman edit DPS.');
        }
    }
}
