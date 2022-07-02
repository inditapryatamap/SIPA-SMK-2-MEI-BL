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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_magang_pkl');
            $table->date('tanggal');
            $table->enum('absensi', ['h', 'i', 's', 'a'])->comment('h: hadir, i: izin, s: sakit, a: tanpa keterangan');
            $table->enum('status_guru_pembimbing', [0, 1, 2])->comment('0: belum di validasi, 1: divalidasi, 2: tidak divalidasi');
            $table->enum('status_pembimbing_lapang', [0, 1, 2])->comment('0: belum di validasi, 1: divalidasi, 2: tidak divalidasi');
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_magang_pkl')->references('id')->on('pengajuan_magang_pkl')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
};
