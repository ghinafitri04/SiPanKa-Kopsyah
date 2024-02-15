<?php

namespace App\Http\Controllers;

use App\Models\AdminKabupatenKota;
use App\Models\KabupatenKota;
use Illuminate\Http\Request;

class AdminProvinsiManajemenKabKotaController extends Controller
{
    public function index()
    {
        $adminKabupatenKota = \App\Models\AdminKabupatenKota::all();
        $kabupatenKotaList = KabupatenKota::all();
        $jumlahAdminKabupatenKota = \App\Models\AdminKabupatenKota::count(); // Hitung jumlah admin kabupaten/kota
    
        // Simpan nilai dalam sesi
        session()->put('jumlahAdminKabupatenKota', $jumlahAdminKabupatenKota);
    
        return view('admin_provinsi_manajemenkabkota', compact('adminKabupatenKota', 'kabupatenKotaList', 'jumlahAdminKabupatenKota'));
    }
    
    


    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'username' => 'required|unique:admin_kabupatenkota',
            'password' => 'required',
            'kabupatenKota' => 'required', // Pastikan kabupaten/kota dipilih
        ]);

        // Simpan data akun admin kabupaten ke dalam database
        $admin = new AdminKabupatenKota();
        $admin->username = $request->username;
        $admin->password = bcrypt($request->password); // Simpan versi terenkripsi dari password
        $admin->password_text = $request->password; // Simpan versi teks biasa dari password
        $admin->id_kabupatenkota = $request->kabupatenKota; // Assign kabupaten/kota
        $admin->id_admin_provinsi = 1;
        // Tambahkan role 'admin_kabupatenkota'
        $admin->role = 'admin_kabupatenkota';
        // tambahkan atribut lainnya jika ada
        $admin->save();

        // Redirect ke halaman yang sesuai setelah berhasil menyimpan
        return redirect()->route('admin_provinsi.manajemen_kab_kota.index')->with('success', 'Akun admin kabupaten berhasil ditambahkan.');
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
            // Find the admin kabupaten by ID
            $admin = AdminKabupatenKota::findOrFail($id);
            $kabupatenKotaList = KabupatenKota::all();

            return view('edit_admin_provinsi_manajemenkabkota', compact('admin', 'kabupatenKotaList'));
        } catch (\Exception $e) {
            // Handle errors by redirecting with an error message
            return redirect()->route('admin_provinsi.manajemen_kab_kota.index')->with('error', 'Gagal memuat halaman edit admin kabupaten.');
        }
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'username' => 'required|unique:admin_kabupatenkota,username,' . $id . ',id_admin_kabupatenkota',
            'password' => 'nullable',
            'kabupatenKota' => 'required',
        ]);

        try {
            $admin = AdminKabupatenKota::findOrFail($id);
            // Update admin data
            $admin->username = $request->username;
            if ($request->has('password')) {
                $admin->password = bcrypt($request->password);
                $admin->password_text = $request->password;
            }
            $admin->id_kabupatenkota = $request->kabupatenKota; // Ubah menjadi 'kabupatenKota'
            $admin->save();

            // Redirect with success message
            return redirect()->route('admin_provinsi.manajemen_kab_kota.index')->with('success', 'Data admin kabupaten berhasil diperbarui.');
        } catch (\Exception $e) {
            // Handle errors by redirecting with an error message
            return redirect()->route('admin_provinsi.manajemen_kab_kota.index')->with('error', 'Gagal memperbarui data admin kabupaten.');
        }
    }

  
}
