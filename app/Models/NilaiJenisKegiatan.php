<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiJenisKegiatan extends Model
{
    use HasFactory;

    protected $table = 'nilai_jenis_kegiatan';

    protected $fillable = [
        'id_magang_pkl',
        'id_mn_kegiatan',
        'pelaksanaan',
    ];
}
