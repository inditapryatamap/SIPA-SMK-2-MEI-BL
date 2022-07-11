<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = new Jurusan();
        $jurusan->id = 1;
        $jurusan->nama_jurusan = 'Teknik Instalasi Tenaga Listrik';
        $jurusan->created_at = Carbon::now();
        $jurusan->updated_at = Carbon::now();
        $jurusan->save();

        $jurusan = new Jurusan();
        $jurusan->id = 2;
        $jurusan->nama_jurusan = 'Teknik Pemesinan';
        $jurusan->created_at = Carbon::now();
        $jurusan->updated_at = Carbon::now();
        $jurusan->save();

        $jurusan = new Jurusan();
        $jurusan->id = 3;
        $jurusan->nama_jurusan = 'Teknik Komputer dan Jaringan';
        $jurusan->created_at = Carbon::now();
        $jurusan->updated_at = Carbon::now();
        $jurusan->save();

        $jurusan = new Jurusan();
        $jurusan->id = 4;
        $jurusan->nama_jurusan = 'Teknik Audio Video';
        $jurusan->created_at = Carbon::now();
        $jurusan->updated_at = Carbon::now();
        $jurusan->save();

        $jurusan = new Jurusan();
        $jurusan->id = 5;
        $jurusan->nama_jurusan = 'Teknik Sepeda Motor';
        $jurusan->created_at = Carbon::now();
        $jurusan->updated_at = Carbon::now();
        $jurusan->save();
    }
}
