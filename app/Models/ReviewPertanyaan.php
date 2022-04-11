<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewPertanyaan extends Model
{
    use HasFactory;

    protected $table = 'review_pertanyaan';

    protected $fillable = [
        'pertanyaan', 'tipe_pertanyaan', 'created_by'
    ];
}
