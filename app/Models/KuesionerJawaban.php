<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuesionerJawaban extends Model
{
    use HasFactory;

    protected $table = 'kuesioner_jawaban';

    protected $fillable = [
        'id_kuesioner', 'id_user', 'for', 'jawaban'
    ];
}
