<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenReview extends Model
{
    use HasFactory;

    protected $table = 'dokumen_dan_review';

    protected $fillable = [
        'id_siswa', 
        'id_magang_pkl',
        'judul_laporan',
        'file_laporan_ms_word',
        'file_laporan_pdf',

        'jumlah_review_score_sangat_rendah',
        'jumlah_review_score_rendah',
        'jumlah_review_score_tinggi',
        'jumlah_review_score_sangat_tinggi',
        'total_score_review',
    ];
}
