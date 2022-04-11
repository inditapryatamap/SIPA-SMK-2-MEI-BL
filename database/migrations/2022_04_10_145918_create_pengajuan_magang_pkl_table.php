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
        Schema::create('pengajuan_magang_pkl', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->enum('jenis_kegiatan', ['pkl', 'magang']);
            $table->unsignedBigInteger('id_perusahaan');
            $table->string('nama_pembimbing')->nullable();
            $table->enum('status', ['diproses', 'diverifikasi', 'ditolak']);
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('siswa');
            $table->foreign('id_perusahaan')->references('id')->on('perusahaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_magang_pkl');
    }
};
