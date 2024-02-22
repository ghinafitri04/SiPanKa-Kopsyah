<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KoperasiController extends Controller
{
    public function dashboard()
    {
        return view('admin_provinsi_dashboard');
    }
}
