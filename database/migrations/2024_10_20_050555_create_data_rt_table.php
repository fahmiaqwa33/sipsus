<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataRtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_rt', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rt'); // Nama RT
            $table->foreignId('rw_id')->constrained('data_rw')->onDelete('cascade'); // Relasi dengan tabel data_rw
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
        Schema::dropIfExists('data_rt');
    }
}
