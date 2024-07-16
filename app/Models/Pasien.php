<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pasien extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama_pasien',
        'email',
        'foto_profil',
        'tgl_lahir',
        'phone',
        'password',
        'alamat',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
