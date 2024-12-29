<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataRWController;
use App\Http\Controllers\DataWargaController;
use App\Http\Controllers\DataRTController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\DasboardDataWargaController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\SuratController;
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



// Admin kelurahan Route untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Admin kelurahan Route untuk halaman Data RW
Route::get('/datarw', [DataRWController::class, 'index'])->name('admin.datarw.index');
Route::get('/data_rw/create', [DataRWController::class, 'create'])->name('datarw.create');
Route::post('/data_rw', [DataRWController::class, 'store'])->name('datarw.store');
Route::get('/data_rw/{id}/edit', [DataRWController::class, 'edit'])->name('datarw.edit');
Route::put('/data_rw/{id}', [DataRWController::class, 'update'])->name('datarw.update');
Route::delete('/data_rw/{id}', [DataRWController::class, 'destroy'])->name('datarw.destroy'); // Pastikan ini ada

// Admin kelurahan Route untuk halaman Data RT
Route::get('/admin/data_rt', [DataRTController::class, 'index'])->name('admin.data_rt.index');
Route::get('/data-rt/create', [DataRTController::class, 'create'])->name('data_rt.create');
Route::post('/data-rt', [DataRTController::class, 'store'])->name('data_rt.store');
Route::get('/data-rt/{id}/edit', [DataRTController::class, 'edit'])->name('data_rt.edit');
Route::put('/data-rt/{id}', [DataRTController::class, 'update'])->name('data_rt.update');
Route::delete('/data-rt/{id}', [DataRTController::class, 'destroy'])->name('data_rt.destroy');

// Admin kelurahan Route untuk Data Warga
Route::get('/data-warga', [DataWargaController::class, 'index'])->name('data-warga.index');
Route::get('/data-warga/create', [DataWargaController::class, 'create'])->name('data-warga.create');
Route::post('/data-warga', [DataWargaController::class, 'store'])->name('data-warga.store');
Route::get('/data-warga/{id}/edit', [DataWargaController::class, 'edit'])->name('data-warga.edit');
Route::put('/data-warga/{id}', [DataWargaController::class, 'update'])->name('data-warga.update');
Route::delete('/data-warga/{id}', [DataWargaController::class, 'destroy'])->name('data-warga.destroy');

// Admin kelurahan Route untuk informasi
Route::get('/admin/informasi', [InformasiController::class, 'index'])->name('admin.informasi.index');
Route::get('/admin/informasi/create', [InformasiController::class, 'create'])->name('admin.informasi.create');
Route::post('/admin/informasi', [InformasiController::class, 'store'])->name('admin.informasi.store');
Route::get('/admin/informasi/{id}/edit', [InformasiController::class, 'edit'])->name('admin.informasi.edit');
Route::put('/admin/informasi/{id}', [InformasiController::class, 'update'])->name('admin.informasi.update');
Route::delete('/admin/informasi/{id}', [InformasiController::class, 'destroy'])->name('admin.informasi.destroy');
Route::get('/admin/informasi/{id}', [InformasiController::class, 'show'])->name('admin.informasi.show');


// Rw route untuk data rt
Route::get('/rw/data-rt', [DataRTController::class, 'index2'])->name('rw.data_rt.index'); 

//Rw route untuk data warga
Route::get('/rw/data-warga', [DataWargaController::class, 'index2'])->name('rw.data_warga.index');

//Rw route untuk informasi
Route::get('/informasi', [InformasiController::class, 'index2'])->name('rw.informasi.index');
Route::get('/rw/informasi/{id}', [InformasiController::class, 'show2'])->name('rw.informasi.show');

//RT route untuk data warga 
Route::get('/rt/data-warga', [DataWargaController::class, 'index3'])->name('rt.data_warga.index');
Route::get('/rt/informasi', [InformasiController::class, 'index3'])->name('rt.informasi.index');
Route::get('/rt/informasi/{id}', [InformasiController::class, 'show3'])->name('rt.informasi.show');

//RT route untuk menampilkan halaman daftar surat masuk
Route::get('/surat-masuk', [SuratController::class, 'index'])->name('surat.masuk');
Route::get('/surat/{id}/detail', [SuratController::class, 'show'])->name('surat.detail');
Route::post('/surat/{id}/terima', [SuratController::class, 'terima'])->name('surat.terima');
Route::post('/surat/{id}/tolak', [SuratController::class, 'tolak'])->name('surat.tolak');

//warga route ajukan surat
Route::get('/ajukan-surat', [PengajuanSuratController::class, 'create'])->name('ajukan-surat.create');
Route::post('/ajukan-surat', [PengajuanSuratController::class, 'store'])->name('ajukan-surat.store');

Route::get('/surat/{surat}', [SuratController::class, 'show'])
    ->middleware('auth', 'check.surat.access')
    ->name('surat.show');

Route::get('/surat/{id}/terima', [SuratController::class, 'terima'])->name('surat.terima');
Route::get('/surat/{id}/tolak', [SuratController::class, 'tolak'])->name('surat.tolak');


Route::get('/surat-masuk/rw/index2', [SuratController::class, 'index2'])->name('surat.masuk.rw.index2');
Route::post('/surat-masuk/rw/terima2/{id}', [SuratController::class, 'terima2'])->name('surat.terima.rw');
Route::post('/surat-masuk/rw/tolak2/{id}', [SuratController::class, 'tolak2'])->name('surat.tolak.rw');
//surat terverivikasi rw
Route::get('/surat-terverifikasi', [SuratController::class, 'terverifikasi'])->name('surat.terverifikasi');
// surat ditolak rw
Route::get('/surat-ditolak', [SuratController::class, 'ditolak'])->name('surat.ditolak');
//surat terveriviikasi RT
Route::get('/surat-terverifikasi', [SuratController::class, 'terverivikasirt'])->name('surat.terverifikasi');
//ditolak rt
Route::get('/surat-ditolak', [SuratController::class, 'ditolakrt'])->name('surat.ditolak');

// Menampilkan daftar surat masuk admin
Route::get('/admin/surat-masuk', [SuratController::class, 'index3'])->name('surat.masuk.admin.index3');

// Menerima surat (disetujui admin)
Route::get('/admin/surat/terima/{id}', [SuratController::class, 'terima3'])->name('surat.terima.admin');

// Menolak surat (ditolak admin)
Route::post('/surat/tolak/{id}', [SuratController::class, 'tolak3'])->name('surat.tolak');
//upload dokumen admin 
Route::post('/admin/surat/upload-dokumen/{id}', [SuratController::class, 'uploadDokumen'])->name('surat.upload.dokumen');