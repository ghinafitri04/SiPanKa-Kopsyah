<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengawasan;
use App\Models\PemilihanDps;

class KoperasiHasilPengawasanController extends Controller
{
    public function index()
    {
        // Mengambil data pengawasan DPS dari model Pengawasan
        $pengawasan = Pengawasan::all();

        // Mengirim data pengawasan ke view
        return view('koperasi_hasil_pengawasan', compact('pengawasan'));
    }

    public function show($id)
    {
        $pengawasan = Pengawasan::findOrFail($id);

        return view('koperasi_hasil_pengawasan2', compact('pengawasan'));
    }
}
