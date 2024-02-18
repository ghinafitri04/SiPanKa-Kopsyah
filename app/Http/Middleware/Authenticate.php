<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        // Jika ini adalah permintaan logout, kembalikan null untuk menghindari pengalihan
        if ($request->routeIs('logout')) {
            return null;
        }

        // Jika permintaan adalah JSON, kembalikan null untuk menghindari pengalihan
        if ($request->expectsJson()) {
            return null;
        }

        // Jika bukan permintaan logout atau permintaan JSON, arahkan ke halaman login
        return route('login');
    }
}
