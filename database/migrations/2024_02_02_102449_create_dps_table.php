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
        Schema::create('dps', function (Blueprint $table) {
            $table->id('id_dps');
            $table->unsignedBigInteger('id_admin_kabupatenkota');
            $table->string('username');
            $table->string('password');
            $table->string('password_text');
            $table->string('nama_lengkap');
            $table->string('kontak');
            $table->string('alamat');
            $table->string('sertifikat'); // Menyesuaikan dengan tipe data yang sesuai untuk menyimpan file PDF
            $table->string('role');
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_admin_kabupatenkota')->references('id_admin_kabupatenkota')->on('admin_kabupatenkota')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dps');
    }
};
