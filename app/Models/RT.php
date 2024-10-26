<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RT;
use App\Models\DataRW;

class RT extends Model
{
    use HasFactory;

    // Menentukan tabel 'data_rt' di database
    protected $table = 'data_rt'; 

    // Kolom yang bisa diisi massal
    protected $fillable = ['nama_rt', 'rw_id', 'rt', 'no_hp', 'email'];

    // Relasi ke DataRW (gunakan model DataRW)
    public function rw()
    {
        return $this->belongsTo(DataRW::class, 'rw_id'); // Menggunakan model DataRW dan foreign key rw_id
    }

    // Relasi ke User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
