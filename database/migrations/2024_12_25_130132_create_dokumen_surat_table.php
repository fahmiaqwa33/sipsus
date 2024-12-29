<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenSuratTable extends Migration
{
    public function up()
    {
        Schema::create('dokumen_surat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surat_id'); // Relasi ke tabel surat
            $table->string('file_path'); // Lokasi file dokumen
            $table->string('file_name'); // Nama file asli
            $table->timestamps();

            // Tambahkan foreign key
            $table->foreign('surat_id')->references('id')->on('surat')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokumen_surat');
    }
}