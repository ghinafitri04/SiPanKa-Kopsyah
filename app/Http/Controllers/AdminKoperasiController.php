<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProsesKonversi;

class AdminKoperasiController extends Controller
{
    public function dashboard()
    {
        return view('koperasi_dashboard');
    }

    public function proses_konversi()
    {
        // Ambil data proses konversi koperasi
        $prosesKonversi = ProsesKonversi::all();

        return view('koperasi_tabel_Konversi', compact('prosesKonversi'));
    }

}
