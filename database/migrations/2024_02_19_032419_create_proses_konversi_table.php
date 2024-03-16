<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proses_konversi', function (Blueprint $table) {
            $table->id('id_proses_konversi');
            $table->unsignedBigInteger('id_koperasi');
            $table->string('rapat_anggota')->nullable();
            $table->string('perubahan_pad')->nullable();
            $table->string('nama_notaris')->nullable();
            $table->string('bukti_notaris')->nullable();
            $table->string('pengesahan_pad')->nullable();
            $table->date('tanggal')->nullable();
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('id_koperasi')->references('id_koperasi')->on('koperasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proses_konversi');
    }
};
