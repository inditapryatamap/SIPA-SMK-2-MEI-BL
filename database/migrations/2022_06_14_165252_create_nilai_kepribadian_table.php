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
        Schema::create('nilai_kepribadian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_magang_pkl');
            $table->unsignedBigInteger('id_kepribadian');
            $table->float('nilai');
            $table->timestamps();

            $table->foreign('id_magang_pkl')->references('id')->on('pengajuan_magang_pkl')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kepribadian')->references('id')->on('mn_kepribadian')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_kepribadian');
    }
};
