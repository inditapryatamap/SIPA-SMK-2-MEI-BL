<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surat';

    protected $fillable = [
        'id_siswa', 'id_jenis_surat', 'id_perusahaan', 'status', 'file', 'created_by'
    ];
}
