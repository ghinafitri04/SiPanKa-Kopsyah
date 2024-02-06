<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminKabupatenKotaController extends Controller
{
    public function dashboard()
    {
        return view('admin_kabkota_dashboard');
    }
}
