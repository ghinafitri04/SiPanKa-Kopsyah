<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HalamanController;

Route::get('/tes', [HalamanController::class, 'tes']);
// routes/web.php

use App\Http\Controllers\AdminController;

// ...

Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
