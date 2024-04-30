<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koperasi;
use App\Models\AdminKabupatenKota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminKabupatenKotaManajemenKoperasiController extends Controller
{
    public function index()
{
    // Mendapatkan id_admin_kabupatenkota yang sedang login
    $id_admin_kabupatenkota = Auth::id();

    // Mengambil daftar koperasi yang memiliki id_admin_kabupatenkota sesuai dengan admin yang sedang login
    $koperasiList = Koperasi::where('id_admin_kabupatenkota', $id_admin_kabupatenkota)->get();

    // Mengambil jumlah admin koperasi yang terdaftar
    $jumlahAdminKoperasi = Koperasi::where('id_admin_kabupatenkota', $id_admin_kabupatenkota)->count();

    // Mengambil daftar kabupaten/kota yang terkait dengan admin yang sedang login
    $kabupatenKotaList = AdminKabupatenKota::with('kabupatenKota')
        ->where('id_admin_kabupatenkota', $id_admin_kabupatenkota)
        ->join('kabupatenkota', 'admin_kabupatenkota.id_kabupatenkota', '=', 'kabupatenkota.id_kabupatenkota')
        ->pluck('kabupatenkota.nama_kabupatenkota', 'admin_kabupatenkota.id_admin_kabupatenkota')
        ->all();

    return view('admin_kabkota_adminkoperasi', compact('koperasiList', 'kabupatenKotaList', 'jumlahAdminKoperasi'));
}


    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required|unique:koperasi',
            'password' => 'required',
            // 'id_admin_kabupatenkota' => 'required', // Pastikan id_admin_kabupatenkota dipilih dari form
        ]);

        $id_admin_kabupatenkota = Auth::id();
        $koperasi = new Koperasi();
        $koperasi->username = $request->username;
        $koperasi->password = bcrypt($request->password);
        $koperasi->password_text = $request->password;
        $koperasi->id_admin_kabupatenkota = $id_admin_kabupatenkota;
        $koperasi->nama_admin_koperasi = $request->nama_admin_koperasi;
        $koperasi->nama_koperasi = $request->nama_koperasi;
        $koperasi->role = 'koperasi';
        $koperasi->save();

        return redirect()->route('admin_kabkota.manajemen_koperasi.index')->with('success', 'Data koperasi berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        try {
            $koperasi = Koperasi::findOrFail($id);
            $koperasi->delete();

            return redirect()->route('admin_kabkota.manajemen_koperasi.index')->with('success', 'Data koperasi berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin_kabkota.manajemen_koperasi.index')->with('error', 'Gagal menghapus data koperasi.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|unique:koperasi,username,' . $id . ',id_koperasi',
            'password' => 'nullable',
            'kabupatenKota' => 'required',
            // Add other validation rules as needed
        ]);

        try {
            $koperasi = Koperasi::findOrFail($id);
            $koperasi->username = $request->username;
            if ($request->has('password')) {
                $koperasi->password = bcrypt($request->password);
                $koperasi->password_text = $request->password;
            }
            $koperasi->id_kabupatenkota = $request->kabupatenKota;
            // Update other attributes if needed
            $koperasi->save();

            return redirect()->route('admin_kabkota.manajemen_koperasi.index')->with('success', 'Data koperasi berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('admin_kabkota.manajemen_koperasi.index')->with('error', 'Gagal memperbarui data koperasi.');
        }
    }
}
