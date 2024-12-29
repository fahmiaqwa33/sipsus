<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Menambahkan relasi ke tabel users
            $table->string('nik'); // NIK warga yang mengajukan
            $table->foreignId('kategori_surat_id')->constrained('kategori_surat')->onDelete('cascade');
            $table->string('alamat');
            $table->text('alasan');
            $table->date('tanggal_pengajuan'); // Pastikan tipe data sesuai dengan format tanggal
            $table->enum('status', ['pending', 'disetujui RT', 'disetujui RW', 'disetujui admin', 'ditolak'])->default('pending');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat');
    }
}
