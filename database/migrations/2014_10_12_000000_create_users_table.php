<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pengguna
            $table->string('nik', 16)->unique(); // NIK harus unik dan terdiri dari 16 angka
            $table->string('password'); // Password pengguna
            $table->integer('role_id')->comment('1: Admin, 2: RW, 3: RT, 4: Warga'); // Role ID
            $table->timestamps(); // Created at dan Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
