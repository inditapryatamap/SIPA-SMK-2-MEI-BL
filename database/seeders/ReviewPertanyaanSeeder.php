<?php

namespace Database\Seeders;

use App\Models\ReviewPertanyaan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewPertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $review_pertanyaan = new ReviewPertanyaan();
        $review_pertanyaan->pertanyaan = 'Pada saat mengikuti kegiatan PKL / Magang, apakah perusahaan yang Anda pilih sesuai dengan jurusan Anda ?';
        $review_pertanyaan->tipe_pertanyaan = 'semua';
        $review_pertanyaan->created_by = 1;
        $review_pertanyaan->created_at = Carbon::now();
        $review_pertanyaan->updated_at = Carbon::now();
        $review_pertanyaan->save();

        $review_pertanyaan = new ReviewPertanyaan();
        $review_pertanyaan->pertanyaan = 'Apakah perusahaan yang Anda pilih bisa direkomendasikan kepada siswa/i lain ?';
        $review_pertanyaan->tipe_pertanyaan = 'semua';
        $review_pertanyaan->created_by = 1;
        $review_pertanyaan->created_at = Carbon::now();
        $review_pertanyaan->updated_at = Carbon::now();
        $review_pertanyaan->save();

        $review_pertanyaan = new ReviewPertanyaan();
        $review_pertanyaan->pertanyaan = 'Contoh hanya pkl';
        $review_pertanyaan->tipe_pertanyaan = 'pkl';
        $review_pertanyaan->created_by = 1;
        $review_pertanyaan->created_at = Carbon::now();
        $review_pertanyaan->updated_at = Carbon::now();
        $review_pertanyaan->save();
    }
}
