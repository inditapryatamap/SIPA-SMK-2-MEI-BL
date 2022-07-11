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
        $pembimbinglapang = new PembimbingLapang();
        $pembimbinglapang->id = 1;
        $pembimbinglapang->email = 'lapang@gmail.com';
        $pembimbinglapang->nama = 'Fajar Rizky';
        $pembimbinglapang->no_telpon = '+6289512415124';
        $pembimbinglapang->password = bcrypt('12345678');
        $pembimbinglapang->created_at = Carbon::now();
        $pembimbinglapang->updated_at = Carbon::now();
        $pembimbinglapang->save();

        $pembimbinglapang = new PembimbingLapang();
        $pembimbinglapang->id = 2;
        $pembimbinglapang->email = 'nadim@gmail.com';
        $pembimbinglapang->nama = 'Nadiem Makarim';
        $pembimbinglapang->no_telpon = '+6289512415124';
        $pembimbinglapang->password = bcrypt('12345678');
        $pembimbinglapang->created_at = Carbon::now();
        $pembimbinglapang->updated_at = Carbon::now();
        $pembimbinglapang->save();

        $pembimbinglapang = new PembimbingLapang();
        $pembimbinglapang->id = 3;
        $pembimbinglapang->email = 'jardine@gmail.com';
        $pembimbinglapang->nama = 'Jardine Cycle';
        $pembimbinglapang->no_telpon = '+6289512415124';
        $pembimbinglapang->password = bcrypt('12345678');
        $pembimbinglapang->created_at = Carbon::now();
        $pembimbinglapang->updated_at = Carbon::now();
        $pembimbinglapang->save();
    }
}
