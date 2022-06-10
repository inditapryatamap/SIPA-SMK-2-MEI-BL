<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class GuruPembimbing extends Authenticable
{
    use Notifiable;

    protected $guard = 'guru_pembimbing';
    protected $table = 'guru_pembimbing';

    protected $fillable = [
        'email', 'nama', 'nis','no_telpon','password'
    ];

    protected $hidden = ['password'];
}
