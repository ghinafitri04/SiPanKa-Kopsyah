<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProsesKonversi;
use Illuminate\Support\Facades\Auth;

class AdminKoperasiController extends Controller
{
    public function dashboard()
    {
        return view('koperasi_dashboard');
    }

    public function proses_konversi()
    {
        // Mendapatkan id koperasi yang sedang login
        $id_koperasi = Auth::user()->id_koperasi;

        // Mengambil data proses konversi berdasarkan id koperasi yang sedang login
        $prosesKonversi = ProsesKonversi::where('id_koperasi', $id_koperasi)->get();

        return view('koperasi_tabel_Konversi', compact('prosesKonversi'));
    }
}
