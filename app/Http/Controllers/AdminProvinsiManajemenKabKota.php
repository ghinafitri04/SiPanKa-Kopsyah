<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProvinsiManajemenKabKota extends Controller
{
    //
    public function manajemenKabKota()
    {
        return view('admin_provinsi_manajemenkabkota');
    }
}
