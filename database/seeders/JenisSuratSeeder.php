<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
use App\Models\Jurusan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = new JenisSurat();
        $jurusan->id = 1;
        $jurusan->name = 'Surat Pengantar PKL';
        $jurusan->description = '-';
        $jurusan->created_at = Carbon::now();
        $jurusan->updated_at = Carbon::now();
        $jurusan->save();

        $jurusan = new JenisSurat();
        $jurusan->id = 2;
        $jurusan->name = 'Surat Pengantar Magang';
        $jurusan->description = '-';
        $jurusan->created_at = Carbon::now();
        $jurusan->updated_at = Carbon::now();
        $jurusan->save();
    }
}
