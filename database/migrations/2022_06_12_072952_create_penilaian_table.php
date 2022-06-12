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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jenis_penilaian');
            $table->unsignedBigInteger('id_magang_pkl');
            $table->integer('nilai');
            $table->timestamps();

            $table->foreign('id_jenis_penilaian')->references('id')->on('jenis_penilaian');
            $table->foreign('id_magang_pkl')->references('id')->on('pengajuan_magang_pkl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
};
