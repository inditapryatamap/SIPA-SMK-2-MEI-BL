<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAspekTeknis extends Model
{
    use HasFactory;

    protected $table = 'nilai_aspek_teknis';

    protected $fillable = [
        'id_magang_pkl',
        'jenis_keterampilan',
        'nilai',
        'keterangan',
        'status',
    ];
}
