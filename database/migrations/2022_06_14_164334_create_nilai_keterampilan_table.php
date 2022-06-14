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
        Schema::create('nilai_keterampilan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_magang_pkl');
            $table->text('keterampilan');
            $table->text('indikator_keberhasilan');
            $table->enum('status', [0, 1, 2])->comment('0: belum di validasi, 1: divalidasi, 2: tidak divalidasi');
            $table->timestamps();

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
        Schema::dropIfExists('nilai_keterampilan');
    }
};
