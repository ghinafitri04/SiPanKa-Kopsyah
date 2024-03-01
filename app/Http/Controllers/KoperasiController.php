<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koperasi;
use App\Models\AdminKabupatenKota;
use Illuminate\Support\Facades\Storage; // Import class Storage untuk mengelola penyimpanan file

class KoperasiController extends Controller
{
    public function dashboard()
    {
        return view('koperasi_dashboard');
    }
}
