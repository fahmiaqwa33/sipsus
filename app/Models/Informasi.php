<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory; // Menggunakan trait HasFactory untuk mendukung factory

    protected $table = 'informasi'; // Menentukan nama tabel di database

    protected $fillable = [
        'judul',   // Kolom yang dapat diisi secara massal
        'konten',
        'gambar',
    ];
}
