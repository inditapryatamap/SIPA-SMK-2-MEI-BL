<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_jenis_surat');
            $table->enum('status', ['diproses', 'diverifikasi', 'ditolak']);
            $table->text('file')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('siswa');
            $table->foreign('id_jenis_surat')->references('id')->on('jenis_surat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat');
    }
};
