<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalHarian extends Model
{
    use HasFactory;

    protected $table = 'jurnal_harian';

    protected $fillable = [
        'id_siswa', 'id_magang_pkl', 'tanggal', 'kegiatan', 'status_pembimbing_lapang', 'status_guru_pembimbing'
    ];
}
