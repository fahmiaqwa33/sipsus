<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataRWController;
use App\Http\Controllers\DataWargaController;
use App\Http\Controllers\DataRTController;

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
Route::get('/admin/datarw', [DataRWController::class, 'index'])->name('admin.datarw.index');

// Route untuk halaman Data RT
Route::get('/admin/data_rt', [DataRTController::class, 'index'])->name('admin.data_rt.index');

// Route untuk Data Warga
Route::get('/data-warga', [DataWargaController::class, 'index'])->name('data-warga.index');
