<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siswa = new Siswa();
        $siswa->id = 1;
        $siswa->email = 'siswa@gmail.com';
        $siswa->nama = 'Rendi Alvianida';
        $siswa->nis = '123456789';
        $siswa->id_jurusan = 1;
        $siswa->jenis_kelamin = 'Laki Laki';
        $siswa->ttl = 'Bandar Lampung, 5 Maret 1999';
        $siswa->no_telpon = '+62895636134374';
        $siswa->password = bcrypt('12345678');
        $siswa->created_at = Carbon::now();
        $siswa->updated_at = Carbon::now();
        $siswa->save();

        $siswa = new Siswa();
        $siswa->id = 2;
        $siswa->email = 'komang@gmail.com';
        $siswa->nama = 'Komang Kresna P';
        $siswa->nis = '123451234';
        $siswa->id_jurusan = 1;
        $siswa->jenis_kelamin = 'Laki Laki';
        $siswa->ttl = 'Bandar Lampung, 5 Maret 1999';
        $siswa->no_telpon = '+62895636134374';
        $siswa->password = bcrypt('12345678');
        $siswa->created_at = Carbon::now();
        $siswa->updated_at = Carbon::now();
        $siswa->save();
    }
}
