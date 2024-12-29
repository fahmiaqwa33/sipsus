<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRW extends Model
{
    use HasFactory;

    protected $table = 'data_rw';
    
    protected $fillable = ['nama_rw', 'rw', 'no_hp', 'email'];

    public function rts()
    {
        return $this->hasMany(RT::class, 'rw_id');
    }
}
