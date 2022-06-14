<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MnSuratKeterangan extends Model
{
    use HasFactory;

    protected $table = 'mn_surat_keterangan';

    protected $fillable = [
        'aspek_penilaian'
    ];
}
