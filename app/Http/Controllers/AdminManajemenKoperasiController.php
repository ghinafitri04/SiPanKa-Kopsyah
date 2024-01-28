<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;

class AdminManajemenKoperasiController extends Controller
{
    public function manajemenKoperasi()
    {
        // Mengambil data admin dengan role id = 3
        $admins = Admin::where('id_role', 3)->get();

        return view('admin_provinsi_adminkoperasi', ['admins' => $admins]);
    }

    public function tambahDataAdminKoperasi(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'namaLengkap' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'region' => 'required|string',
        ]);

        // Mencari role berdasarkan nama
        $role = Role::where('role_name', 'Koperasi')->first();

        // Memastikan role ditemukan sebelum melanjutkan
        if ($role) {
            // Membuat data admin baru dengan role id = 3
            $admin = new Admin([
                'id_role' => $role->id,
                'nama_instansi' => $request->input('namaLengkap'),
                'username' => $request->input('username'),
                'password' => bcrypt($request->input('password')),
                'region' => $request->input('region'),
            ]);

            // Simpan data admin baru ke database
            $admin->save();

            // Redirect kembali ke halaman manajemen koperasi dengan pesan sukses
            return redirect()->route('admin.manajemenKoperasi')->with('success', 'Data admin berhasil ditambahkan');
        } else {
            // Handle jika role tidak ditemukan
            return redirect()->route('admin.manajemenKoperasi')->with('error', 'Role tidak ditemukan');
        }
    }

    public function hapusDataAdminKoperasi($id)
    {
        // Cari data admin berdasarkan ID
        $admin = Admin::find($id);

        // Periksa apakah data ditemukan
        if ($admin) {
            // Hapus data
            $admin->delete();

            return redirect()->route('admin.manajemenKoperasi')->with('success', 'Data admin berhasil dihapus');
        } else {
            return redirect()->route('admin.manajemenKoperasi')->with('error', 'Data admin tidak ditemukan');
        }
    }


    public function editDataAdminKoperasi($id)
    {
        // Cari data admin berdasarkan ID
        $admin = Admin::find($id);

        // Periksa apakah data ditemukan
        if ($admin) {
            // Tampilkan halaman edit dengan data admin yang akan diubah
            return view('edit_admin', ['admin' => $admin]);
        } else {
            return redirect()->route('admin.manajemenKoperasi')->with('error', 'Data admin tidak ditemukan');
        }
    }

    public function updateDataAdminKoperasi(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'editNamaLengkap' => 'required|string',
            'editUsername' => 'required|string',
            'editRegion' => 'required|string',
        ]);

        // Cari data admin berdasarkan ID
        $admin = Admin::find($id);

        // Periksa apakah data ditemukan
        if ($admin) {
            // Perbarui data admin
            $admin->nama_instansi = $request->input('editNamaLengkap');
            $admin->username = $request->input('editUsername');
            $admin->region = $request->input('editRegion');
            $admin->save();

            return redirect()->route('admin.manajemenKoperasi')->with('success', 'Data admin berhasil diperbarui');
        } else {
            return redirect()->route('admin.manajemenKoperasi')->with('error', 'Data admin tidak ditemukan');
        }
    }
}
