<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\ProsesKonversi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ProsesKonversiController extends Controller
{
    public function prosesTahap1(Request $request)
    {
        // Validasi file
        $request->validate([
            'rapat_anggota' => 'required|file|mimes:pdf|max:2048', // Maksimum 2MB
        ]);
    
        // Simpan file ke dalam sistem file (contoh: folder "uploads")
        $file = $request->file('rapat_anggota');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName);
    
        // Simpan nama file ke dalam database
        $prosesKonversi = ProsesKonversi::create([
            'id_koperasi' => auth()->user()->id_koperasi,
            'rapat_anggota' => $filePath,
            // Sisipkan kolom lain yang perlu disimpan di sini
        ]);
    
        // Simpan ID proses konversi ke dalam session setelah mengunggah file
        session(['prosesKonversiId' => $prosesKonversi->id]);
    
        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Dokumen Rapat Anggota berhasil diunggah.');
    }

    public function prosesTahap2()
    {
        // Tambahkan logika untuk halaman selanjutnya di sini
        return view('koperasi_proses_konversi2');
    }
    

}