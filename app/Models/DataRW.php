<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRW extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit jika nama tabel di database berbeda dari plural model
    protected $table = 'data_rw';

    // Atribut yang diizinkan untuk diisi melalui mass assignment
    protected $fillable = [
        'nama_rw',
        'rw',
        'no_hp',
        'email',
    ];
}
