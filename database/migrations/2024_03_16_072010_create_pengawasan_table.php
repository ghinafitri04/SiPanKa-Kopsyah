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
        Schema::create('pengawasan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_admin_provinsi');
            $table->unsignedBigInteger('id_dps');
            $table->unsignedBigInteger('id_koperasi');
            $table->text('hasil');
            $table->boolean('status')->nullable();
            $table->text('permasalahan');
            $table->text('saran');
            $table->date('tanggal_pengawasan');
            $table->timestamps();

            // Definisi foreign key constraints
            $table->foreign('id_admin_provinsi')->references('id_admin_provinsi')->on('admin_provinsi');
            $table->foreign('id_dps')->references('id_dps')->on('dps');
            $table->foreign('id_koperasi')->references('id_koperasi')->on('koperasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengawasan');
    }
};
