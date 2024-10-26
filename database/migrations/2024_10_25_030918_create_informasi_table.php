<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiTable extends Migration
{
    public function up()
    {
        Schema::create('informasi', function (Blueprint $table) {
            $table->id(); // Kolom id utama
            $table->string('judul'); // Kolom judul
            $table->text('konten'); // Kolom isi konten
            $table->string('gambar')->nullable(); // Kolom gambar
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('informasi');
    }
}
