<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surat';
    protected $fillable = ['user_id', 'kategori_surat_id', 'alamat', 'alasan', 'status','alasan_penolakan'];
    
    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
//relasi ke kategori surat
    public function kategoriSurat()
    {
        return $this->belongsTo(KategoriSurat::class, 'kategori_surat_id');
    }
// relasi ke dokumen surat
    public function dokumen()
    {
        return $this->hasOne(DokumenSurat::class);
    }

}

