<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminKabupatenKotaPengawasanDpsController extends Controller
{
    public function index()
    {
        return view('admin_kabkota_pengawasandps');
    }
}
