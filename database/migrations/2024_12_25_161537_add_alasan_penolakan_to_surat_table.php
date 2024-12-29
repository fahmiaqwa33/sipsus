<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlasanPenolakanToSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat', function (Blueprint $table) {
            $table->string('alasan_penolakan')->nullable(); // Menambahkan kolom alasan_penolakan
        });
    }
    
    public function down()
    {
        Schema::table('surat', function (Blueprint $table) {
            $table->dropColumn('alasan_penolakan'); // Menghapus kolom jika migrasi dibatalkan
        });
    }
}
