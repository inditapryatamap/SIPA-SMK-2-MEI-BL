<?php

namespace Database\Seeders;

use App\Models\MnJenisKegiatan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenilaianJenisKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kuesioner = new MnJenisKegiatan();
        $kuesioner->id_jurusan = 1;
        $kuesioner->kompetensi = 'Menerapkan Keselamatan, Keamanan dan Kesehatan Kerja';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new MnJenisKegiatan();
        $kuesioner->id_jurusan = 1;
        $kuesioner->kompetensi = 'Menerapkan Dasar Dasar Kelistrikan, Elektronika';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new MnJenisKegiatan();
        $kuesioner->id_jurusan = 1;
        $kuesioner->kompetensi = 'Menerapkan Dasar Teknik Digital & Aplikasi Sederhana';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new MnJenisKegiatan();
        $kuesioner->id_jurusan = 1;
        $kuesioner->kompetensi = 'Menggunakan Alat Ukur Multi Tester';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new MnJenisKegiatan();
        $kuesioner->id_jurusan = 1;
        $kuesioner->kompetensi = 'Mengoperasikan dan Melakukan Perawatan Alat Alat Rumah Tangga';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();
    }
}
