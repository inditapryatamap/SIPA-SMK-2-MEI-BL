<?php

namespace Database\Seeders;

use App\Models\JenisKegiatan;
use App\Models\JenisSurat;
use App\Models\Jurusan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = new JenisKegiatan();
        $jurusan->id = 1;
        $jurusan->nama_kegiatan = 'Praktik Kerja Lapangan - PKL';
        $jurusan->durasi = 90;
        $jurusan->keterangan = '-';
        $jurusan->created_at = Carbon::now();
        $jurusan->updated_at = Carbon::now();
        $jurusan->save();

        $jurusan = new JenisKegiatan();
        $jurusan->id = 2;
        $jurusan->nama_kegiatan = 'Magang';
        $jurusan->durasi = 30;
        $jurusan->keterangan = '-';
        $jurusan->created_at = Carbon::now();
        $jurusan->updated_at = Carbon::now();
        $jurusan->save();
    }
}
