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
        Schema::create('nilai_aspek_teknis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_magang_pkl');
            $table->text('jenis_keterampilan');
            $table->float('nilai');
            $table->text('keterangan');
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
        Schema::dropIfExists('nilai_aspek_teknis');
    }
};
