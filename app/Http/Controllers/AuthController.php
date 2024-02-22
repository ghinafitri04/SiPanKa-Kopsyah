<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        // Log input credentials
        Log::info('Login Attempt:', $credentials);

        // Coba untuk autentikasi dengan semua guard
        $guards = ['admin_provinsi', 'admin_kabupatenkota', 'koperasi', 'dps'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->attempt($credentials)) {
                // Autentikasi berhasil, ambil pengguna dan arahkan sesuai role
                $user = Auth::guard($guard)->user();
                Log::info('User authenticated:', ['user' => $user]);
                return $this->redirectBasedOnRole($user->role);
            }
        }

        // Autentikasi gagal untuk semua guard
        return back()->withErrors(['loginError' => 'Username atau password salah.']);
    }



    protected function redirectBasedOnRole($role)
    {
        switch ($role) {
            case 'admin_provinsi':
                Log::info('Redirecting to dashboardAdminProvinsi');
                return redirect()->route('dashboardAdminProvinsi');
                break;

            case 'admin_kabupatenkota':
                return redirect()->route('admin_kabupatenkota.dashboard');
                break;

                case 'koperasi':
                    return redirect()->route('dashboard.koperasi');
                    break;
    

            case 'dps':
                return redirect()->route('dps.dashboard');
                break;

            default:
                return redirect('/dashboard'); // Arahkan ke halaman default jika role tidak dikenali
                break;
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Melakukan logout pengguna
        $request->session()->invalidate(); // Mematikan sesi pengguna
        return redirect('/login'); // Mengarahkan pengguna ke halaman login setelah logout
    }
}    
