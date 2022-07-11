<?php

namespace Database\Seeders;

use App\Models\Kuesioner;
use App\Models\KuesionerSelect;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KuesionerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kuesioner = new Kuesioner();
        $kuesioner->id = 1;
        $kuesioner->pertanyaan = 'Fasilitas yang disediakan dalam menunjang kegiatan PKL';
        $kuesioner->for = 'siswa';
        $kuesioner->type = 'range';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 2;
        $kuesioner->pertanyaan = 'Kegiatan yang dilakukan selama PKL sudah sesuai dengan jurusan Anda';
        $kuesioner->for = 'siswa';
        $kuesioner->type = 'range';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 3;
        $kuesioner->pertanyaan = 'Perusahaan tempat Anda PKL sangat rekomendasi untuk kegiatan PKL pada periode selanjutnya';
        $kuesioner->for = 'siswa';
        $kuesioner->type = 'choice';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 4;
        $kuesioner->pertanyaan = 'Seberapa Anda merekomendasikan tempat PKL tersebut';
        $kuesioner->for = 'siswa';
        $kuesioner->type = 'range';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 5;
        $kuesioner->pertanyaan = 'Bagaimana dengan lingkungan kerja';
        $kuesioner->for = 'siswa';
        $kuesioner->type = 'range';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 6;
        $kuesioner->pertanyaan = 'Bagaimana dengan jadwal perusahaan tersebut';
        $kuesioner->for = 'siswa';
        $kuesioner->type = 'range';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 7;
        $kuesioner->pertanyaan = 'Apakah PKL di perusahaan tersebut harus membayar terlebih dahulu';
        $kuesioner->for = 'siswa';
        $kuesioner->type = 'choice';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 8;
        $kuesioner->pertanyaan = 'Jika Ya, berapa uang yang harus dipersiapkan';
        $kuesioner->for = 'siswa';
        $kuesioner->type = 'select';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 9;
        $kuesioner->pertanyaan = 'Apakah Anda menggunakan Aplikasi e-PKL';
        $kuesioner->for = 'siswa';
        $kuesioner->type = 'choice';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();
        
        $kuesioner = new Kuesioner();
        $kuesioner->id = 10;
        $kuesioner->pertanyaan = 'Kemudahan Penggunaan aplikasi e-PKL';
        $kuesioner->for = 'siswa';
        $kuesioner->type = 'range';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 11;
        $kuesioner->pertanyaan = 'Rata - rata kemampuan dasar siswa dalam menyelesaikan pekerjaan';
        $kuesioner->for = 'lapang';
        $kuesioner->type = 'range';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 12;
        $kuesioner->pertanyaan = 'Disiplin dan Sikap siswa dalam berkomunikasi dan berintraksi selama pelaksanaan PKL?';
        $kuesioner->for = 'lapang';
        $kuesioner->type = 'range';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 13;
        $kuesioner->pertanyaan = 'Dampak kehadiran siswa PKL dalam pelaksanaan perkerjaan operasional perusahaan/instansi?';
        $kuesioner->for = 'lapang';
        $kuesioner->type = 'range';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 14;
        $kuesioner->pertanyaan = 'Apakah Bapak/Ibu memberikan arahan pekerjaan kepada para siswa?';
        $kuesioner->for = 'lapang';
        $kuesioner->type = 'range';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 15;
        $kuesioner->pertanyaan = 'Apakah Bapak/Ibu memberi ruang diskusi kepada para siswa?';
        $kuesioner->for = 'lapang';
        $kuesioner->type = 'range';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 16;
        $kuesioner->pertanyaan = 'Secara umum bagaimana kinerja siswa selama PKL?';
        $kuesioner->for = 'lapang';
        $kuesioner->type = 'range';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 17;
        $kuesioner->pertanyaan = 'Apakah Bapak/Ibu menggunakan Aplikasi e-PKL';
        $kuesioner->for = 'lapang';
        $kuesioner->type = 'choice';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 18;
        $kuesioner->pertanyaan = 'Kemudahan Penggunaan aplikasi e-PKL';
        $kuesioner->for = 'lapang';
        $kuesioner->type = 'range';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 19;
        $kuesioner->pertanyaan = 'Kesediaan membimbing/menerima mahasiswa PKL di periode berikut';
        $kuesioner->for = 'lapang';
        $kuesioner->type = 'choice';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();

        $kuesioner = new Kuesioner();
        $kuesioner->id = 20;
        $kuesioner->pertanyaan = 'Jika iya kompeten apa saja yang bersedia untuk diterima?';
        $kuesioner->for = 'lapang';
        $kuesioner->type = 'select';
        $kuesioner->created_at = Carbon::now();
        $kuesioner->updated_at = Carbon::now();
        $kuesioner->save();
    }
}
