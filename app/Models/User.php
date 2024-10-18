<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; // Tambahkan ini jika menggunakan notifikasi
use Illuminate\Contracts\Auth\MustVerifyEmail; // Tambahkan ini jika menggunakan verifikasi email
use Illuminate\Foundation\Auth\User as Authenticatable; // Gunakan kelas ini untuk autentikasi

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'name',
        'nik',
        'password',
        'role_id',
    ];

    // Jika menggunakan hashing untuk password
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Tambahkan metode lain jika perlu
}
