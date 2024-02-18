<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koperasi;
use App\Models\KabupatenKota;

class ManajemenKoperasiController extends Controller
{
    public function index()
{
    $koperasiList = Koperasi::all();
    $kabupatenKotaList = KabupatenKota::all();
    $jumlahKoperasi = Koperasi::count(); // Hitung jumlah admin kabupaten/kota

    // Debugging: Check if data is retrieved from KabupatenKota model
    dd($kabupatenKotaList);

    // Simpan nilai dalam sesi
    session()->put('jumlahKoperasi', $jumlahKoperasi);

    

    return view('admin_provinsi_adminkoperasi', compact('koperasiList', 'kabupatenKotaList', 'jumlahKoperasi'));
}


    public function store(Request $request)
    {
        $request->validate([
            'nama_koperasi' => 'required',
            'no_badan_usaha' => 'required',
            'username' => 'required|unique:koperasi',
            'password' => 'required',
            'kabupatenKota' => 'required',
        ]);

        $koperasi = new Koperasi();
        $koperasi->nama_admin_koperasi = $request->nama_admin_koperasi;
        $koperasi->nama_koperasi = $request->nama_koperasi;
        $koperasi->no_badan_usaha = $request->no_badan_usaha;
        $koperasi->username = $request->username;
        $koperasi->password = bcrypt($request->password);
        $koperasi->password_text = $request->password;
        $koperasi->id_kabupatenkota = $request->kabupatenKota;
        // tambahkan atribut lainnya jika ada
        $koperasi->save();

        return redirect()->route('manajemen_koperasi.index')->with('success', 'Data koperasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Tambahkan logika untuk menampilkan form edit koperasi dengan ID tertentu
    }

    // Method untuk menyimpan perubahan data koperasi yang telah diedit
    public function update(Request $request, $id)
    {
        // Tambahkan logika untuk menyimpan perubahan data koperasi yang telah diedit
    }

    // Method untuk menghapus data koperasi
    public function destroy($id)
    {
        // Tambahkan logika untuk menghapus data koperasi dengan ID tertentu
    }

}
