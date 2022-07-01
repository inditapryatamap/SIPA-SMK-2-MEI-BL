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
        Schema::create('kuesioner_jawaban_select', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kuesioner_jawaban');
            $table->string('option');
            $table->timestamps();

            $table->foreign('id_kuesioner_jawaban')->references('id')->on('kuesioner_jawaban')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kuesioner_jawaban_select');
    }
};
