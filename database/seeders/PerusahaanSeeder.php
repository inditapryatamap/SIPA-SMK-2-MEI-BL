<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perusahaan = new Perusahaan();
        $perusahaan->id_pembimbing_lapang = 1;
        $perusahaan->nama_perusahaan = 'PT Microdata Indonesia';
        $perusahaan->profile_perusahaan = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s';
        $perusahaan->alamat_perusahaan = 'Pasaraya Blok M Gedung B Lt. 6. Jalan Iskandarsyah II No.';
        $perusahaan->no_telp = '+6221-5084-9000';
        $perusahaan->deskripsi_pekerjaan = 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).';
        $perusahaan->created_by = 1;
        $perusahaan->created_at = Carbon::now();
        $perusahaan->updated_at = Carbon::now();
        $perusahaan->save();
    }
}
