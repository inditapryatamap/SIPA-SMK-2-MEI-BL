<?php

namespace Database\Seeders;

use App\Models\GuruPembimbing;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruPembimbingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siswa = new GuruPembimbing();
        $siswa->id = 1;
        $siswa->email = 'guru@gmail.com';
        $siswa->nama = 'Mukhlis';
        $siswa->nis = '888888888';
        $siswa->no_telpon = '+62895636134374';
        $siswa->password = bcrypt('12345678');
        $siswa->created_at = Carbon::now();
        $siswa->updated_at = Carbon::now();
        $siswa->save();
    }
}
