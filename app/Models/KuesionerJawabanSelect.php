<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuesionerJawabanSelect extends Model
{
    use HasFactory;

    protected $table = 'kuesioner_jawaban_select';

    protected $fillable = [
        'id_kuesioner_jawaban', 'option'
    ];
}
