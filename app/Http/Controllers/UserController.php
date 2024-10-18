<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan semua pengguna
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Menampilkan form untuk menambah pengguna
    public function create()
    {
        return view('users.create');
    }

    // Menangani proses penyimpanan pengguna
    public function store(Request $request)
    {
        // Validasi dan simpan pengguna baru
    }

    // Menampilkan form untuk mengedit pengguna
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Menangani proses pembaruan pengguna
    public function update(Request $request, User $user)
    {
        // Validasi dan update pengguna
    }

    // Menghapus pengguna
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
