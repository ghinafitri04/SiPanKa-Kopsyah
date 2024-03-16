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
        Schema::create('pemilihan_dps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_koperasi');
            $table->unsignedBigInteger('id_dps');
            $table->string('nama_dps2')->nullable();
            $table->date('tanggal_dipilih');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('id_koperasi')->references('id_koperasi')->on('koperasi')->onDelete('cascade');
            $table->foreign('id_dps')->references('id_dps')->on('dps')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemilihan_dps');
    }
};
