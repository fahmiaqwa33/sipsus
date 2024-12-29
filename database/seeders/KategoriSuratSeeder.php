<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriSurat;

class KategoriSuratSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_surat' => 'Surat Keterangan Domisili', 'deskripsi' => 'Surat untuk keterangan tempat tinggal.'],
            ['nama_surat' => 'Surat Keterangan Usaha', 'deskripsi' => 'Surat untuk keterangan usaha.'],
            ['nama_surat' => 'Surat Pengantar Nikah', 'deskripsi' => 'Surat untuk keperluan nikah.'],
        ];

        KategoriSurat::insert($data);
    }
}
