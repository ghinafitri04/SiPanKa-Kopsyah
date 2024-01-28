<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
@@ -15,6 +17,46 @@
*/

Route::get('/admin_provinsi_dashboard', function () {
    return view('admin_provinsi_dashboard');
});

use App\Http\Controllers\HalamanController;

Route::get('/tes', [HalamanController::class, 'tes']);
// routes/web.php

use App\Http\Controllers\AdminController;

// ...

Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

use App\Http\Controllers\Auth\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
