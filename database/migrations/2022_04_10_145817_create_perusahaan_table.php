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
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pembimbing_lapang');
            $table->string('nama_perusahaan');
            $table->string('profile_perusahaan');
            $table->text('alamat_perusahaan');
            $table->string('no_telp');
            $table->text('deskripsi_pekerjaan');
            $table->enum('status', ['diproses', 'diverifikasi', 'ditolak'])->comment('diproses', 'diverifikasi', 'ditolak')->default('diproses');
            $table->integer('created_by')->nullable();
            $table->timestamps();

            $table->foreign('id_pembimbing_lapang')->references('id')->on('pembimbing_lapang')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('created_by')->references('id')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perusahaan');
    }
};
