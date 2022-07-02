<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenReview extends Model
{
    use HasFactory;

    protected $table = 'dokumen';

    protected $fillable = [
        'id_siswa', 
        'id_magang_pkl',
        'judul_laporan',
        'file_laporan_ms_word',
        'file_laporan_pdf',
        'tipe',
        'status_guru_pembimbing'
    ];
}
