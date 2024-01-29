<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;

class AdminProvinsiManajemenDpsController extends Controller
{
    public function manajemenDps()
    {
        $admins = Admin::where('id_role', 4)->get();
        return view('admin_provinsi_admindps', ['admins' => $admins]);
    }

    public function tambahDataAdminDps(Request $request)
    {
        $request->validate([
            'namaLengkap' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'kabupatenKota' => 'required|string',
        ]);

        $role = Role::where('role_name', 'Admin DPS')->first();

        if ($role) {
            $admin = new Admin([
                'id_role' => $role->id,
                'nama_instansi' => $request->input('namaLengkap'),
                'username' => $request->input('username'),
                'password' => bcrypt($request->input('password')),
                'region' => $request->input('kabupatenKota'),
            ]);

            $admin->save();

            return redirect()->route('admin.manajemenDps')->with('success', 'Data admin berhasil ditambahkan');
        } else {
            return redirect()->route('admin.manajemenDps')->with('error', 'Role tidak ditemukan');
        }
    }

    public function hapusDataAdminDps($id)
    {
        $admin = Admin::find($id);

        if ($admin) {
            $admin->delete();
            return redirect()->route('admin.manajemenDps')->with('success', 'Data admin berhasil dihapus');
        } else {
            return redirect()->route('admin.manajemenDps')->with('error', 'Data admin tidak ditemukan');
        }
    }

    public function editDataAdminDps($id)
    {
        $admin = Admin::find($id);

        if ($admin) {
            return view('edit_admin', ['admin' => $admin]);
        } else {
            return redirect()->route('admin.manajemenDps')->with('error', 'Data admin tidak ditemukan');
        }
    }

    public function updateDataAdminDps(Request $request, $id)
    {
        $request->validate([
            'editNamaLengkap' => 'required|string',
            'editUsername' => 'required|string',
            'editKabKota' => 'required|string',
        ]);

        $admin = Admin::find($id);

        if ($admin) {
            $admin->nama_instansi = $request->input('editNamaLengkap');
            $admin->username = $request->input('editUsername');
            $admin->region = $request->input('editKabKota');
            $admin->save();

            return redirect()->route('admin.manajemenDps')->with('success', 'Data admin berhasil diperbarui');
        } else {
            return redirect()->route('admin.manajemenDps')->with('error', 'Data admin tidak ditemukan');
        }
    }
}
