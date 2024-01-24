<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
@@ -15,6 +17,46 @@
*/

Route::get('/', function () {
    return view('dashboard');
});

use App\Http\Controllers\HalamanController;

Route::get('/tes', [HalamanController::class, 'tes']);
// routes/web.php

use App\Http\Controllers\AdminController;

// ...

Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
