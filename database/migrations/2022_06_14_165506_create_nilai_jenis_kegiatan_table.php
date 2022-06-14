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
        Schema::create('nilai_jenis_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_magang_pkl');
            $table->unsignedBigInteger('id_mn_kegiatan');
            $table->boolean('pelaksanaan');
            $table->timestamps();

            $table->foreign('id_magang_pkl')->references('id')->on('pengajuan_magang_pkl')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_mn_kegiatan')->references('id')->on('mn_jenis_kegiatan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_jenis_kegiatan');
    }
};
