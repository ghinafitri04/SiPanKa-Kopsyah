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
        Schema::create('admin_kabupatenkota', function (Blueprint $table) {
            $table->id('id_admin_kabupatenkota');
            $table->unsignedBigInteger('id_kabupatenkota');
            $table->unsignedBigInteger('id_admin_provinsi');
            $table->string('username');
            $table->string('password');
            $table->string('password_text');
            $table->string('role');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('id_kabupatenkota')->references('id_kabupatenkota')->on('kabupatenkota')->onDelete('cascade');
            $table->foreign('id_admin_provinsi')->references('id_admin_provinsi')->on('admin_provinsi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_kabupatenkota');
    }
};
