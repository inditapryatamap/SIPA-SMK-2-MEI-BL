<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MagangPKL extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_magang_pkl';

    protected $fillable = [
        'id_guru_pembimbing', 'id_siswa', 'jenis_kegiatan', 'id_jurusan', 'id_perusahaan','nama_pembimbing','status'
    ];
}
