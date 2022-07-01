<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuesionerSelect extends Model
{
    use HasFactory;

    protected $table = 'kuesioner_select';

    protected $fillable = [
        'id_kuesioner', 'option'
    ];
}
