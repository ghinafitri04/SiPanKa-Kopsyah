<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProvinsiLoginController extends Auth
{
    public function showLoginForm()
    {
        return view
        ('auth.admin_provinsi_login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi form
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        
        //Disini controller coba login 
        $credentials = $request->only('username', 'password');
        if (Auth::guard('admin_provinsi')->attempt($credentials)) {
            // Jika berhasil, redirect ke halaman dashboard
            return redirect()->route('dashboard');
        }
        
        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return redirect()->back()->withInput($request->only('username'))->withErrors(['username' => 'Invalid credentials']);
    }

    // Logout
    public function logout()
    {
        Auth::guard('admin_provinsi')->logout();
        return redirect('/');
    }
}
