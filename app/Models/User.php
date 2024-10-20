<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'name',
        'nik',
        'password',
        'role_id',
        'rt_id', // Tambahkan kolom rt_id di sini
    ];

    // Jika menggunakan hashing untuk password
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi ke RT
    public function rt()
    {
        return $this->belongsTo(RT::class);
    }

    // Tambahkan metode lain jika perlu
}
