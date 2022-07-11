<?php

namespace Database\Seeders;

use App\Models\GuruPembimbing;
use App\Models\KuesionerSelect;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            JurusanSeeder::class,
            JenisKegiatanSeeder::class,
            GuruPembimbingSeeder::class,
            PembimbingLapangSeeder::class,
            SiswaSeeder::class,
            AdminSeeder::class,
            PerusahaanSeeder::class,
            ReviewPertanyaanSeeder::class,
            JenisSuratSeeder::class,
            KuesionerSeeder::class,
            KuesionerSelectSeeder::class,
            PenilaianJenisKegiatanSeeder::class
        ]);
    }
}
