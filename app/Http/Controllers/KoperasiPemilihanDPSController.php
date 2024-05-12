<?php

namespace App\Http\Controllers;

use App\Models\PemilihanDps;
use App\Models\RiwayatPemilihanDps;
use App\Models\Dps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class KoperasiPemilihanDPSController extends Controller
{
    public function index()
    {
        // Mendapatkan ID koperasi yang sedang login
        $id_koperasi = Auth::id();

        // Mendapatkan DPS yang belum dipilih sebagai DPS 2 untuk koperasi yang sedang login
        $dps1 = Dps::all();

        $riwayatPemilihan = RiwayatPemilihanDps::where('id_koperasi', $id_koperasi)
            ->with(['dps', 'koperasi'])
            ->latest() // Mengurutkan berdasarkan tanggal pembuatan secara descending (terbaru dulu)
            ->get();


        $pemilihanDps = PemilihanDps::where('id_koperasi', $id_koperasi)
            ->with(['dps', 'koperasi'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('koperasi_pemilihan_dps', [
            'dps1' => $dps1,
            'riwayatPemilihan' => $riwayatPemilihan,
            'pemilihanDps' => $pemilihanDps
        ]);
    }



    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'dps1' => 'required|exists:dps,id_dps',
            'dps2' => 'nullable|string', // DPS 2 boleh kosong atau string
        ], [
            'dps1.required' => 'Kolom DPS 1 wajib diisi.',
            'dps1.exists' => 'DPS 1 yang dipilih tidak valid.',
        ]);

        try {
            // Mendapatkan ID koperasi yang sedang login
            $id_koperasi = Auth::id();

            // Cek apakah koperasi sudah memilih DPS sebelumnya
            $existingPemilihan = PemilihanDps::where('id_koperasi', $id_koperasi)->first();

            if ($existingPemilihan) {
                // Jika sudah, update data pemilihan DPS yang ada
                $existingPemilihan->update([
                    'id_dps' => $request->dps1,
                    'nama_dps2' => $request->dps2,
                    'tanggal_dipilih' => now(),
                ]);

                // Simpan data pemilihan DPS ke riwayat
                RiwayatPemilihanDps::create([
                    'id_pemilihan_dps' => $existingPemilihan->id_pemilihan_dps,
                    'id_koperasi' => $id_koperasi,
                    'id_dps' => $request->dps1,
                    'nama_dps2' => $request->dps2,
                    'tanggal_pemilihan' => now(),
                ]);
            } else {
                // Jika belum, simpan data pemilihan DPS baru
                $newPemilihan = PemilihanDps::create([
                    'id_koperasi' => $id_koperasi,
                    'id_dps' => $request->dps1,
                    'nama_dps2' => $request->dps2,
                    'tanggal_dipilih' => now(),
                ]);

                // Simpan data pemilihan DPS ke riwayat
                RiwayatPemilihanDps::create([
                    'id_pemilihan_dps' => $newPemilihan->id_pemilihan_dps,
                    'id_koperasi' => $id_koperasi,
                    'id_dps' => $request->dps1,
                    'nama_dps2' => $request->dps2,
                    'tanggal_pemilihan' => now(),
                ]);
            }

            // Redirect atau berikan respons sesuai kebutuhan Anda
            return redirect()->back()->with('success', 'Pemilihan DPS berhasil disimpan.');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect()->back()->with('error', 'Gagal menyimpan data. ' . $e->getMessage());
        }
    }
}
