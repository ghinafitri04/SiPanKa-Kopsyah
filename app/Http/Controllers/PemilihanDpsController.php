<?php
namespace App\Http\Controllers;

use App\Models\Dps;
use App\Models\PemilihanDps;
use Illuminate\Http\Request;

class PemilihanDpsController extends Controller
{
    public function index()
    {
        // Ambil semua data DPS
        $dps = Dps::all();
    
        // Kirim data DPS ke tampilan
        return view('koperasi_pemilihan_dps', compact('dps'));
    }
}
