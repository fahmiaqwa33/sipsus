<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRtIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom rt_id
            $table->unsignedBigInteger('rt_id')->nullable()->after('role_id');

            // Menambahkan foreign key ke tabel data_rt
            $table->foreign('rt_id')->references('id')->on('data_rt')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus foreign key
            $table->dropForeign(['rt_id']);
            // Menghapus kolom rt_id
            $table->dropColumn('rt_id');
        });
    }
}
