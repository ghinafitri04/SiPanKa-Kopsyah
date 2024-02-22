<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koperasi;
use App\Models\AdminKabupatenKota;

class KoperasiController extends Controller
{
  
    public function update_profile_koperasi($id)
    {
        $id = intval($id); // Konversi $id menjadi integer
        $koperasi = Koperasi::findOrFail($id);
    
        // Tambahkan penanganan jika koperasi tidak ditemukan
        if (!$koperasi) {
            return response()->json(['message' => 'Koperasi not found'], 404);
        }

    
        $kabupatenKota = null;
        if ($koperasi->adminKabupatenKota) {
            $kabupatenKota = AdminKabupatenKota::with('kabupatenKota')
                ->join('kabupatenkota', 'admin_kabupatenkota.id_kabupatenkota', '=', 'kabupatenkota.id_kabupatenkota')
                ->where('admin_kabupatenkota.id_kabupatenkota', $koperasi->adminKabupatenKota->id_kabupatenkota)
                ->select('kabupatenkota.nama_kabupatenkota as nama_kabupatenkota')
                ->first();
        }
        
        return view('koperasi_update_profile', compact('koperasi', 'kabupatenKota'));
    }

}

