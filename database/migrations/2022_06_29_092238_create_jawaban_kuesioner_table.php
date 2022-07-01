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
        Schema::create('kuesioner_jawaban', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kuesioner');
            $table->integer('id_user');
            $table->enum('for', ['siswa', 'lapang'])->comment('siswa, lapang');
            $table->text('jawaban');
            $table->timestamps();

            $table->foreign('id_kuesioner')->references('id')->on('kuesioner')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kuesioner_jawaban');
    }
};
