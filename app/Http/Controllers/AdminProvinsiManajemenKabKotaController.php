<?php

namespace App\Http\Controllers;

use App\Models\AdminKabupatenKota;
use Illuminate\Http\Request;

class AdminProvinsiManajemenKabKotaController extends Controller
{
    public function index()
    {
        $adminKabupatenKota = \App\Models\AdminKabupatenKota::all();
        return view('admin_provinsi_manajemenkabkota', compact('adminKabupatenKota'));
    }
}
