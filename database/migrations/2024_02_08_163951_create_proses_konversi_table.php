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
        Schema::create('proses_konversi', function (Blueprint $table) {
            $table->id('id_proses_konversi');
            $table->unsignedBigInteger('id_koperasi');
            $table->binary('rapat_anggota_pdf_data');
            $table->binary('perubahan_akad_pdf_data');
            $table->binary('perubahan_pad_gambar_data');
            $table->string('nama_notaris');
            $table->binary('pengesahan_pad_pdf_data');
            $table->timestamps();

             // Foreign Key
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
