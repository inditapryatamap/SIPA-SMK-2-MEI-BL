<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class PembimbingLapang extends Authenticable
{
    use Notifiable;

    protected $guard = 'pembimbing_lapang';
    protected $table = 'pembimbing_lapang';

    protected $fillable = [
        'email', 'nama','no_telpon','password'
    ];

    protected $hidden = ['password'];
}
