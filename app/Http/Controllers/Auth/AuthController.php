<?php

// app/Http/Controllers/Auth/AuthController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan formulir login
    public function showLoginForm()
    {
        return view('login');
    }

    // Menangani proses login
    // app/Http/Controllers/Auth/AuthController.php

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Sesuaikan kolom 'username' dengan nama kolom yang seharusnya ada di tabel
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            // Jika berhasil login
            return redirect('/admin_provinsi_dashboard');
        }

        // Jika login gagal
        return redirect()->route('login')->with('error', 'Username atau password salah');
    }


    // Menangani proses logout
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
