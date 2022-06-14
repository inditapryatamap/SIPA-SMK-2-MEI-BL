<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MnJenisKegiatan extends Model
{
    use HasFactory;

    protected $table = 'mn_jenis_kegiatan';

    protected $fillable = [
        'id_jurusan', 'kompetensi'
    ];
}
