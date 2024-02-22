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
            $table->unsignedBigInteger('id_admin_kabupatenkota');
            $table->string('username');
            $table->string('password');
            $table->string('password_text');
            $table->string('nama_admin_koperasi');
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('nama_koperasi');
            $table->string('no_badan_hukum')->nullable();
            $table->date('tanggal_badan_hukum')->nullable();
            $table->string('logo')->nullable();
            $table->string('role');
            $table->timestamps();

            // Foreign Keys
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
