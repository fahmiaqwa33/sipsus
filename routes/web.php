<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataRWController;
use App\Http\Controllers\DataWargaController;
use App\Http\Controllers\DataRTController;
use App\Http\Controllers\InformasiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

// routes/web.php

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// routes/web.php
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');



// Route untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Route untuk halaman Data RW
Route::get('/datarw', [DataRWController::class, 'index'])->name('admin.datarw.index');
Route::get('/data_rw/create', [DataRWController::class, 'create'])->name('datarw.create');
Route::post('/data_rw', [DataRWController::class, 'store'])->name('datarw.store');
Route::get('/data_rw/{id}/edit', [DataRWController::class, 'edit'])->name('datarw.edit');
Route::put('/data_rw/{id}', [DataRWController::class, 'update'])->name('datarw.update');
Route::delete('/data_rw/{id}', [DataRWController::class, 'destroy'])->name('datarw.destroy'); // Pastikan ini ada

// Route untuk halaman Data RT
Route::get('/admin/data_rt', [DataRTController::class, 'index'])->name('admin.data_rt.index');
Route::get('/data-rt/create', [DataRTController::class, 'create'])->name('data_rt.create');
Route::post('/data-rt', [DataRTController::class, 'store'])->name('data_rt.store');
Route::get('/data-rt/{id}/edit', [DataRTController::class, 'edit'])->name('data_rt.edit');
Route::put('/data-rt/{id}', [DataRTController::class, 'update'])->name('data_rt.update');
Route::delete('/data-rt/{id}', [DataRTController::class, 'destroy'])->name('data_rt.destroy');

// Route untuk Data Warga
Route::get('/data-warga', [DataWargaController::class, 'index'])->name('data-warga.index');
// Route untuk informasi
Route::get('/admin/informasi', [InformasiController::class, 'index'])->name('admin.informasi.index');
Route::get('/admin/informasi/create', [InformasiController::class, 'create'])->name('admin.informasi.create');
Route::post('/admin/informasi', [InformasiController::class, 'store'])->name('admin.informasi.store');
Route::get('/admin/informasi/{id}/edit', [InformasiController::class, 'edit'])->name('admin.informasi.edit');
Route::put('/admin/informasi/{id}', [InformasiController::class, 'update'])->name('admin.informasi.update');
Route::delete('/admin/informasi/{id}', [InformasiController::class, 'destroy'])->name('admin.informasi.destroy');
Route::get('/admin/informasi/{id}', [InformasiController::class, 'show'])->name('admin.informasi.show');
