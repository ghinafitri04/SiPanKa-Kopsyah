<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProvinsiController extends Controller
{
    public function showDashboard()
    {
        return view('admin_provinsi_konversikoperasi');
    }

}
