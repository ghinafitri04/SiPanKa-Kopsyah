<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Dps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DpsProfileController extends Controller
{
    public function showProfile()
    {
        // Mendapatkan ID DPS dari pengguna yang sedang login
        $userId = Auth::id();
    
        // Mengambil data DPS sesuai dengan ID yang didapat dari konteks otentikasi
        $dps = Dps::find($userId);
    
        // Mengecek apakah DPS ditemukan
        if($dps) {
            return view('dps_lengkapi_profil')->with('dps', $dps);
        } else {
            return redirect()->back()->with('error', 'Profil DPS tidak ditemukan.');
        }
    }
    
    public function updateProfile(Request $request)
{
    // Mendapatkan ID DPS dari pengguna yang sedang login
    $userId = Auth::id();

    // Validasi input
    $request->validate([
        'nama_lengkap' => 'required',
        'kontak' => 'required',
        'alamat' => 'required',
        'sertifikat' => 'file|mimes:pdf|max:2048', // Contoh: Hanya menerima file PDF dengan maksimal 2MB
    ]);

    // Mengambil data DPS sesuai dengan ID yang didapat dari konteks otentikasi
    $dps = Dps::find($userId);

    // Mengecek apakah DPS ditemukan
    if($dps) {
        // Menyimpan data profil yang diperbarui
        $dps->nama_lengkap = $request->nama_lengkap;
        $dps->kontak = $request->kontak;
        $dps->alamat = $request->alamat;

      // Mengunggah sertifikat baru jika ada
if ($request->hasFile('sertifikat')) {
    $file = $request->file('sertifikat');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('sertifikat', $fileName);
    $dps->sertifikat = $filePath;

    // Menghapus sertifikat lama jika ada
    if (Storage::exists($dps->sertifikat)) {
        Storage::delete($dps->sertifikat);
    }
}


        $dps->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    } else {
        return redirect()->back()->with('error', 'Profil DPS tidak ditemukan.');
    }
}

}