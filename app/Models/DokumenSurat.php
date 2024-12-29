<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenSurat extends Model
{
    use HasFactory;

    protected $table = 'dokumen_surat';

    protected $fillable = [
        'surat_id',
        'file_path',
        'file_name',
    ];

    // Relasi ke tabel surat
    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }
}