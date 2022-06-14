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
        Schema::create('dokumen_dan_review', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_magang_pkl');
            $table->text('judul_laporan');
            $table->text('file_laporan_ms_word');
            $table->text('file_laporan_pdf');
            $table->integer('jumlah_review_score_sangat_rendah');
            $table->integer('jumlah_review_score_rendah');
            $table->integer('jumlah_review_score_tinggi');
            $table->integer('jumlah_review_score_sangat_tinggi');
            $table->integer('total_score_review');
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
        Schema::dropIfExists('dokumen');
    }
};
