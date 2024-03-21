<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProsesKonversi;
use Illuminate\Support\Facades\Session;

class ProsesKonversiController extends Controller
{
    public function showFormTahap1()
    {
        return view('koperasi_proses_konversi');
    }

    public function prosesTahap1(Request $request)
    {
        // Validasi file jika ada
        if ($request->hasFile('rapat_anggota')) {
            $request->validate([
                'rapat_anggota' => 'file|mimes:pdf|max:2048', // Maksimum 2MB
            ]);

            // Simpan file ke dalam sistem file (contoh: folder "uploads")
            $file = $request->file('rapat_anggota');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads_tahap_1', $fileName);
        } else {
            $filePath = null; // Tidak ada file yang diunggah
        }

        // Simpan data proses konversi tahap 1 ke dalam sesi
        Session::put('prosesKonversiTahap1', $filePath);

        // Jika terdapat file yang diunggah, simpan data ke database
        if ($filePath) {
            ProsesKonversi::create([
                'id_koperasi' => auth()->user()->id_koperasi,
                'rapat_anggota' => $filePath,
            ]);
        }

        return redirect()->back();
    }

    public function showFormTahap2()
    {
        return view('koperasi_proses_konversi2');
    }

    public function prosesTahap2(Request $request)
    {
        // Validasi file jika ada
        if ($request->hasFile('perubahan_pad')) {
            $request->validate([
                'perubahan_pad' => 'file|mimes:pdf|max:2048', // Maksimum 2MB
            ]);

            // Simpan file ke dalam sistem file (contoh: folder "uploads")
            $file = $request->file('perubahan_pad');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads_tahap_2', $fileName);
        } else {
            $filePath = null; // Tidak ada file yang diunggah
        }

        // Perbarui data proses konversi dengan data tahap 2
        Session::put('prosesKonversiTahap2', $filePath);

        // Jika terdapat file yang diunggah, simpan data ke database
        if ($filePath) {
            ProsesKonversi::where('id_koperasi', auth()->user()->id_koperasi)->update([
                'perubahan_pad' => $filePath,
            ]);
        }

        // Redirect kembali ke tahap 2
        return redirect()->route('prosesTahap2')->with('success', 'Dokumen Perubahan PAD berhasil diunggah.');
    }


    public function showFormTahap3()
    {
        return view('koperasi_proses_konversi3');
    }

    public function prosesTahap3(Request $request)
    {
        // Validasi file jika ada
        if ($request->hasFile('bukti_notaris')) {
            $request->validate([
                'nama_notaris' => 'required|string|max:255',
                'bukti_notaris' => 'file|mimes:png,jpg,jpeg|max:2048', // Maksimum 2MB, dan hanya untuk gambar
            ]);

            // Simpan file ke dalam sistem file (contoh: folder "uploads")
            $file = $request->file('bukti_notaris');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads_tahap_3', $fileName);
        } else {
            $filePath = null; // Tidak ada file yang diunggah
        }

        // Perbarui data proses konversi dengan data tahap 2
        Session::put('prosesKonversiTahap3', $filePath);

        // Jika terdapat file yang diunggah, update data ke database
        if ($filePath) {
            ProsesKonversi::where('id_koperasi', auth()->user()->id_koperasi)->update([
                'nama_notaris' => $request->input('nama_notaris'),
                'bukti_notaris' => $filePath,
            ]);
        }

        // Redirect kembali ke tahap 3
        return redirect()->route('prosesTahap3')->with('success', 'Data nama notaris dan bukti notaris berhasil diunggah.');
    }

    public function showFormTahap4()
    {
        return view('koperasi_proses_konversi4');
    }

    public function prosesTahap4(Request $request)
    {
        // Validasi file jika ada
        if ($request->hasFile('pengesahan_pad')) {
            $request->validate([
                'pengesahan_pad' => 'file|mimes:pdf|max:2048', // Maksimum 2MB
            ]);

            // Simpan file ke dalam sistem file (contoh: folder "uploads")
            $file = $request->file('pengesahan_pad');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads_tahap_4', $fileName);
        } else {
            $filePath = null; // Tidak ada file yang diunggah
        }

        // Perbarui data proses konversi dengan data tahap 2
        Session::put('prosesKonversiTahap4', $filePath);

        // Jika terdapat file yang diunggah, simpan data ke database
        if ($filePath) {
            ProsesKonversi::where('id_koperasi', auth()->user()->id_koperasi)->update([
                'pengesahan_pad' => $filePath,
            ]);
        }

        // Redirect kembali ke tahap 2
        return redirect()->route('prosesTahap4')->with('success', 'Dokumen Perubahan PAD berhasil diunggah.');
    }
}
