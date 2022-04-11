<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenReview extends Model
{
    use HasFactory;

    protected $table = 'dokumen_dan_review';

    protected $fillable = [
        'id_magang_pkl','judul_laporan','file_laporan_ms_word','file_laporan_pdf','score_review'
    ];
}
