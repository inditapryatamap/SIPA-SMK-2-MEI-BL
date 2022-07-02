<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $fillable = [
        'id_siswa', 'id_magang_pkl', 'tanggal', 'absensi', 'status_guru_pembimbing', 'status_pembimbing_lapang'
    ];
}
