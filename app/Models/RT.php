<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    use HasFactory;

    protected $table = 'data_rt'; // Tentukan nama tabel yang benar

    protected $fillable = ['nama_rt', 'rw_id'];

    public function rw()
    {
        return $this->belongsTo(RW::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
