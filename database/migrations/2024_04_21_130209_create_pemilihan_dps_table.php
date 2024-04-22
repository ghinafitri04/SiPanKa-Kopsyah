<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemilihanDpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilihan_dps', function (Blueprint $table) {
            $table->id('id_pemilihan_dps');
            $table->unsignedBigInteger('id_koperasi')->unique(); // Menjadikan kolom id_koperasi sebagai unique
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemilihan_dps');
    }
}
