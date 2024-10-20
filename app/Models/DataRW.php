<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRW extends Model
{
    use HasFactory;

    protected $table = 'data_rw'; // Pastikan nama tabel sesuai
    protected $fillable = ['nama_rw']; // Sesuaikan dengan kolom yang ada di tabel
}
