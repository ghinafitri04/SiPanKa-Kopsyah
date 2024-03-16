<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koperasi;
use App\Models\AdminKabupatenKota;


class AdminKabKotaManajemenKoperasiController extends Controller
{
    public function index()
    {
        $jumlahAdminKoperasi = \App\Models\Koperasi::count(); // Hitung jumlah admin kabupaten/kota
        $koperasiList = Koperasi::all();
        $kabupatenKotaList = AdminKabupatenKota::with('kabupatenKota')
            ->join('kabupatenkota', 'admin_kabupatenkota.id_kabupatenkota', '=', 'kabupatenkota.id_kabupatenkota')
            ->pluck('kabupatenkota.nama_kabupatenkota', 'admin_kabupatenkota.id_admin_kabupatenkota')
            ->all();

         // Simpan nilai dalam sesi
         session()->put('jumlahAdminKoperasi', $jumlahAdminKoperasi);

        return view('admin_kabkota_adminkoperasi', compact('koperasiList', 'kabupatenKotaList','jumlahAdminKoperasi'));

    }

    public function detail_index($id)
    {
        $koperasi = Koperasi::findOrFail($id);
        $kabupatenKota = AdminKabupatenKota::with('kabupatenKota')
            ->join('kabupatenkota', 'admin_kabupatenkota.id_kabupatenkota', '=', 'kabupatenkota.id_kabupatenkota')
            ->where('admin_kabupatenkota.id_kabupatenkota', $koperasi->adminKabupatenKota->id_kabupatenkota)
            ->select('kabupatenkota.nama_kabupatenkota as nama_kabupatenkota')
            ->first();

            

        return view('admin_kabkota_detailadminkoperasi', compact('koperasi', 'kabupatenKota'));
    }

    public function showUpdateProfileForm($id)
{
    $koperasi = Koperasi::findOrFail($id);
    $kabupatenKota = AdminKabupatenKota::with('kabupatenKota')
        ->join('kabupatenkota', 'admin_kabupatenkota.id_kabupatenkota', '=', 'kabupatenkota.id_kabupatenkota')
        ->where('admin_kabupatenkota.id_kabupatenkota', $koperasi->adminKabupatenKota->id_kabupatenkota)
        ->select('kabupatenkota.nama_kabupatenkota as nama_kabupatenkota')
        ->first();

    // Kirim data ke tampilan koperasi_update_profile.blade.php
    return view('koperasi_update_profile', compact('koperasi', 'kabupatenKota'));
}


    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:koperasi',
            'password' => 'required',
            'id_admin_kabupatenkota' => 'required', // Pastikan id_admin_kabupatenkota dipilih dari form
        ]);

        $koperasi = new Koperasi();
        $koperasi->username = $request->username;
        $koperasi->password = bcrypt($request->password);
        $koperasi->password_text = $request->password;
        $koperasi->id_admin_kabupatenkota = $request->id_admin_kabupatenkota;
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

    public function edit($id)
    {
        try {
            $koperasi = Koperasi::findOrFail($id);
            // Load additional data if needed
            return view('admin_kabkota_manajemenkoperasi.edit', compact('koperasi'));
        } catch (\Exception $e) {
            return redirect()->route('admin_kabkota.manajemen_koperasi.index')->with('error', 'Gagal memuat halaman edit koperasi.');
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