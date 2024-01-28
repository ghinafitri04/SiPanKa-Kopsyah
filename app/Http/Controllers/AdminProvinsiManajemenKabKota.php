<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;

class AdminProvinsiManajemenKabKota extends Controller
{
    //
    public function manajemenKabKota()
    {
        // Mengambil data admin dengan role id = 2
        $admins = Admin::where('id_role', 2)->get();

        return view('admin_provinsi_manajemenkabkota', ['admins' => $admins]);
    }
    public function tambahDataAdmin(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'namaLengkap' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'kabupatenKota' => 'required|string',
        ]);

        // Mencari role berdasarkan nama
        $role = Role::where('role_name', 'Admin Kabupaten/Kota')->first();

        // Memastikan role ditemukan sebelum melanjutkan
        if ($role) {
            // Membuat data admin baru dengan role id = 2
            $admin = new Admin([
                'id_role' => $role->id,
                'nama_instansi' => $request->input('namaLengkap'),
                'username' => $request->input('username'),
                'password' => bcrypt($request->input('password')),
                'region' => $request->input('kabupatenKota'),
            ]);

            // Simpan data admin baru ke database
            $admin->save();

            // Redirect kembali ke halaman manajemen kabupaten/kota dengan pesan sukses
            return redirect()->route('admin.manajemenKabKota')->with('success', 'Data admin berhasil ditambahkan');
        } else {
            // Handle jika role tidak ditemukan
            return redirect()->route('admin.manajemenKabKota')->with('error', 'Role tidak ditemukan');
        }
    }
    public function hapusDataAdmin($id)
    {
        // Cari data admin berdasarkan ID
        $admin = Admin::find($id);

        // Periksa apakah data ditemukan
        if ($admin) {
            // Hapus data
            $admin->delete();

            return redirect()->route('admin.manajemenKabKota')->with('success', 'Data admin berhasil dihapus');
        } else {
            return redirect()->route('admin.manajemenKabKota')->with('error', 'Data admin tidak ditemukan');
        }
    }
    public function editDataAdmin($id)
    {
        // Cari data admin berdasarkan ID
        $admin = Admin::find($id);

        // Periksa apakah data ditemukan
        if ($admin) {
            // Tampilkan halaman edit dengan data admin yang akan diubah
            return view('edit_admin', ['admin' => $admin]);
        } else {
            return redirect()->route('admin.manajemenKabKota')->with('error', 'Data admin tidak ditemukan');
        }
    }

    public function updateDataAdmin(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'editNamaLengkap' => 'required|string',
            'editUsername' => 'required|string',
            'editKabKota' => 'required|string',
        ]);

        // Cari data admin berdasarkan ID
        $admin = Admin::find($id);

        // Periksa apakah data ditemukan
        if ($admin) {
            // Perbarui data admin
            $admin->nama_instansi = $request->input('editNamaLengkap');
            $admin->username = $request->input('editUsername');
            $admin->region = $request->input('editKabKota');
            $admin->save();

            return redirect()->route('admin.manajemenKabKota')->with('success', 'Data admin berhasil diperbarui');
        } else {
            return redirect()->route('admin.manajemenKabKota')->with('error', 'Data admin tidak ditemukan');
        }
    }
}
