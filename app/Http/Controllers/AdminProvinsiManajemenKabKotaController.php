<?php

namespace App\Http\Controllers;

use App\Models\AdminKabupatenKota;
use App\Models\KabupatenKota;
use Illuminate\Http\Request;
use App\Models\Dps;

class AdminProvinsiManajemenKabKotaController extends Controller
{
    public function index()
    {
        $adminKabupatenKota = \App\Models\AdminKabupatenKota::all();
        $kabupatenKotaList = KabupatenKota::all();  // Get all Kabupaten/Kota from the database
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
            'nama_instansi' => 'required|string|max:255', 
            'password' => 'required',
            'kabupatenKota' => 'required', // Pastikan kabupaten/kota dipilih
        ]);

        // Simpan data akun admin kabupaten ke dalam database
        $admin = new AdminKabupatenKota();
        $admin->nama_instansi = $request->nama_instansi;
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
    $request->validate([
        'username' => 'required|string|max:255|unique:admin_kabupatenkota,username,' . $id . ',id_admin_kabupatenkota',
        'id_kabupatenkota' => 'required|exists:kabupatenkota,id_kabupatenkota',
        'password' => 'nullable|min:8',
        'nama_instansi' => 'required|string|max:255', // Validasi untuk nama_instansi
    ]);

    $admin = AdminKabupatenKota::findOrFail($id);
    $admin->username = $request->username;
    $admin->id_kabupatenkota = $request->id_kabupatenkota;
    $admin->nama_instansi = $request->nama_instansi; // Menyimpan perubahan pada nama_instansi

    if ($request->filled('password')) {
        $admin->password = bcrypt($request->password); // Update password jika diisi
    }

    $admin->save();

    return redirect()->route('admin_provinsi.manajemen_kab_kota.index')->with('success', 'Data admin kabupaten/kota berhasil diperbarui.');
}


}
