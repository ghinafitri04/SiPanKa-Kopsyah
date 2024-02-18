<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DpsController extends Controller
{
    public function dashboard()
    {
        return view('dps_dashboard');
    }
}
