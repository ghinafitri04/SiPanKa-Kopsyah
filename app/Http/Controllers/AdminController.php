<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;

class AdminController extends Controller
{
    // Menampilkan formulir tambah admin
    public function create()
    {
        // Ambil data role yang diperlukan, Anda mungkin perlu menyesuaikan ini
        $roles = Role::whereIn('role_name', ['Kabupaten/Kota', 'Koperasi', 'DPS'])->get();

        return view('admin.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'id_role' => ['required', 'in:Admin Kabupaten/Kota,Koperasi,DPS'],
            'username' => 'required|unique:admins,username',
            'password' => 'required',
            'nama_instansi' => 'required',
            'region' => 'required',
        ]);

        // Dapatkan id_role berdasarkan nama rolenya
        $roleId = Role::where('role_name', $request->id_role)->value('id');

        // Simpan data admin baru dengan menggunakan bcrypt pada password
        Admin::create([
            'id_role' => $roleId,
            'username' => $request->username,
            'password' => bcrypt($request->password), // Menggunakan bcrypt pada password
            'nama_instansi' => $request->nama_instansi,
            'region' => $request->region,
        ]);

        return redirect()->route('tes')->with('success', 'Admin berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('tes')->with('success', 'Admin berhasil dihapus!');
    }
}
