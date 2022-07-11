<?php

namespace Database\Seeders;

use App\Models\KuesionerSelect;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KuesionerSelectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kuesioner = new KuesionerSelect();
        $kuesioner->id_kuesioner = 9;
        $kuesioner->option = 'Rp100.000 - Rp250.000';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new KuesionerSelect();
        $kuesioner->id_kuesioner = 9;
        $kuesioner->option = '< Rp500.000';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new KuesionerSelect();
        $kuesioner->id_kuesioner = 9;
        $kuesioner->option = 'Rp500.000 - Rp750.000';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new KuesionerSelect();
        $kuesioner->id_kuesioner = 9;
        $kuesioner->option = '> Rp1.000.000';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new KuesionerSelect();
        $kuesioner->id_kuesioner = 20;
        $kuesioner->option = 'Teknik Kendaran Ringan (TRR)';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new KuesionerSelect();
        $kuesioner->id_kuesioner = 20;
        $kuesioner->option = 'Teknik Instalasi dan Tenaga Listrik (TITL)';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new KuesionerSelect();
        $kuesioner->id_kuesioner = 20;
        $kuesioner->option = 'Teknik Audio-Video (TAV)';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new KuesionerSelect();
        $kuesioner->id_kuesioner = 20;
        $kuesioner->option = 'Teknik Komputer dan Jaringan (TKJ)';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new KuesionerSelect();
        $kuesioner->id_kuesioner = 20;
        $kuesioner->option = 'Teknik Sepeda Motor (TSM)';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new KuesionerSelect();
        $kuesioner->id_kuesioner = 20;
        $kuesioner->option = 'Teknik Permesinan (TP)';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();
    }
}
