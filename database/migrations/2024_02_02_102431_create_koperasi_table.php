<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('koperasi', function (Blueprint $table) {
            $table->id('id_koperasi');
            $table->unsignedBigInteger('id_kabupatenkota');
            $table->unsignedBigInteger('id_admin_kabupatenkota');
            $table->string('username');
            $table->string('password');
            $table->string('password_text');
            $table->string('nama_admin_koperasi');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('nama_koperasi');
            $table->string('no_badan_hukum');
            $table->date('tanggal_badan_hukum');
            $table->string('logo');
            $table->string('role');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('id_kabupatenkota')->references('id_kabupatenkota')->on('kabupatenkota')->onDelete('cascade');
            $table->foreign('id_admin_kabupatenkota')->references('id_admin_kabupatenkota')->on('admin_kabupatenkota')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koperasi');
    }
};
