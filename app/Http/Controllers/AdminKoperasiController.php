<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminKoperasiController extends Controller
{
    public function dashboard()
    {
        return view('koperasi_dashboard');
    }

}
