<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function tes()
    {
        // Ambil semua data role
        $roles = Role::all();

        // Ambil data role untuk Admin Kabupaten Kota
        $adminKabKotRole = Role::where('role_name', 'Admin Kabupaten/Kota')->first();

        // Jika data role tidak ditemukan, handle kesalahan di sini
        if (!$adminKabKotRole) {
            return abort(500, 'Role "Admin Kabupaten/Kota" tidak ditemukan.');
        }

        // Ambil data admin yang memiliki role sebagai kabupaten atau kota
        $admins = Admin::where('id_role', $adminKabKotRole->id)->with('role')->get();

        return view('tes', compact('roles', 'admins'));
    }
}
