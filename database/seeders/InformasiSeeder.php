<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Informasi;

class InformasiSeeder extends Seeder
{
    public function run()
    {
        Informasi::create([
            'judul' => 'Pembangunan Jalan Baru',
            'konten' => 'Kelurahan akan memulai pembangunan jalan baru untuk memperbaiki akses warga...',
            'gambar' => 'contoh_gambar_1.jpg', // Pastikan gambar ini ada di storage/public
        ]);

        Informasi::create([
            'judul' => 'Festival Budaya Tahunan',
            'konten' => 'Jangan lewatkan festival budaya tahunan yang akan diselenggarakan bulan depan...',
            'gambar' => 'contoh_gambar_2.jpg',
        ]);

        Informasi::create([
            'judul' => 'Program Kesehatan Gratis',
            'konten' => 'Program kesehatan gratis akan diadakan bagi seluruh warga sebagai bentuk kepedulian...',
            'gambar' => 'contoh_gambar_3.jpg',
        ]);
    }
}
