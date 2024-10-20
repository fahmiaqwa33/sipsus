<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Menangani proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|integer',
            'rt_id' => 'required|integer', // Validasi untuk rt_id
        ]);
        
        User::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'rt_id' => $request->rt_id, // Tambahkan rt_id
        ]);
        

        return redirect()->route('login')->with('success', 'Registration successful, please login.');
    }

    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik' => 'required|digits:16', // NIK harus terdiri dari 16 digit
            'password' => 'required|string|min:6',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus terdiri dari 16 angka.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus minimal 6 karakter.'
        ]);
    
        // Cek kredensial login
        if (Auth::attempt(['nik' => $request->nik, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }
    
        // Jika gagal login, kembali dengan pesan error
        return redirect()->back()->with('error', 'NIK atau password salah.');
    }
    
    // Menangani proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('status', 'You have been logged out.');
    }
}
