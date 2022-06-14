<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSuratKeterangan extends Model
{
    use HasFactory;

    protected $table = 'nilai_surat_keterangan';

    protected $fillable = [
        'id_magang_pkl',
        'id_surat_keterangan',
        'nilai',
    ];
}
