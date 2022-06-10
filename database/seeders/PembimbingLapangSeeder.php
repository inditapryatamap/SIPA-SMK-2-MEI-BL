<?php

namespace Database\Seeders;

use App\Models\GuruPembimbing;
use App\Models\PembimbingLapang;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembimbingLapangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siswa = new PembimbingLapang();
        $siswa->id = 1;
        $siswa->email = 'lapang@gmail.com';
        $siswa->nama = 'Fajar Rizky';
        $siswa->no_telpon = '+62895636134374';
        $siswa->password = bcrypt('12345678');
        $siswa->created_at = Carbon::now();
        $siswa->updated_at = Carbon::now();
        $siswa->save();
    }
}
