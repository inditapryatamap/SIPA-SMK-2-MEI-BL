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
            $table->unsignedBigInteger('id_jenis_kegiatan');
            $table->unsignedBigInteger('id_perusahaan');
            $table->unsignedBigInteger('id_guru_pembimbing')->nullable();
            $table->enum('status', ['diproses', 'diverifikasi', 'ditolak'])->comment('diproses, diverifikasi, ditolak');
            $table->timestamps();

            $table->foreign('id_guru_pembimbing')->references('id')->on('guru_pembimbing')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_perusahaan')->references('id')->on('perusahaan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_jenis_kegiatan')->references('id')->on('jenis_kegiatan')->onDelete('cascade')->onUpdate('cascade');
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
