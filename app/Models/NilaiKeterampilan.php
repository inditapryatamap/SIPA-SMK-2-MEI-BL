<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKeterampilan extends Model
{
    use HasFactory;

    protected $table = 'nilai_keterampilan';

    protected $fillable = [
        'id_magang_pkl',
        'keterampilan',
        'indikator_keberhasilan',
        'status',
    ];
}
