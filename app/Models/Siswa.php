<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticable
{
    use Notifiable;

    protected $guard = 'siswa';
    protected $table = 'siswa';

    protected $fillable = [
        'email', 'nama', 'nis', 'id_jurusan','jenis_kelamin','ttl','no_telpon','password'
    ];

    protected $hidden = ['password'];
}
