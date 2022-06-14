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
        Schema::create('nilai_surat_keterangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_magang_pkl');
            $table->unsignedBigInteger('id_surat_keterangan');
            $table->enum('nilai', [0, 1, 2, 3])->comment('0: kurang, 1: cukup, 2: baik, 3: memuaskan');
            $table->timestamps();

            $table->foreign('id_magang_pkl')->references('id')->on('pengajuan_magang_pkl')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_surat_keterangan')->references('id')->on('mn_surat_keterangan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_surat_keterangan');
    }
};
