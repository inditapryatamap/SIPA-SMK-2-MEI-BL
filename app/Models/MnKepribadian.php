<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MnKepribadian extends Model
{
    use HasFactory;

    protected $table = 'mn_kepribadian';

    protected $fillable = [
        'aspek_penilaian'
    ];
}
