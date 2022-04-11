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
        $jurusan->nama_jurusan = 'Informatika';
        $jurusan->created_at = Carbon::now();
        $jurusan->updated_at = Carbon::now();
        $jurusan->save();

        $jurusan = new Jurusan();
        $jurusan->id = 2;
        $jurusan->nama_jurusan = 'Teknologi Informasi';
        $jurusan->created_at = Carbon::now();
        $jurusan->updated_at = Carbon::now();
        $jurusan->save();
    }
}
