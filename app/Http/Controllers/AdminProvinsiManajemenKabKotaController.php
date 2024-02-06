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

        return view('admin_provinsi_manajemenkabkota', compact('adminKabupatenKota', 'kabupatenKotaList'));
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
            // Cari admin kabupaten berdasarkan ID
            $admin = AdminKabupatenKota::findOrFail($id);

            // Hapus admin kabupaten
            $admin->delete();

            // Redirect ke halaman indeks dengan pesan sukses
            return redirect()->route('admin_provinsi.manajemen_kab_kota.index')->with('success', 'Admin kabupaten berhasil dihapus.');
        } catch (\Exception $e) {
            // Tangani kesalahan dengan menampilkan pesan gagal
            return redirect()->route('admin_provinsi.manajemen_kab_kota.index')->with('error', 'Gagal menghapus admin kabupaten.');
        }
    }
}
