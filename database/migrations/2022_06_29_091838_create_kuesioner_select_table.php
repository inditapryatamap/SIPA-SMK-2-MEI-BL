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
        Schema::create('kuesioner_select', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kuesioner');
            $table->string('option');
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
        Schema::dropIfExists('kuesioner_select');
    }
};
