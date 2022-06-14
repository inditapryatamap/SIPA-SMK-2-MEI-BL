<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKepribadian extends Model
{
    use HasFactory;

    protected $table = 'nilai_kepribadian';

    protected $fillable = [
        'id_magang_pkl',
        'id_kepribadian',
        'nilai',
    ];
}
