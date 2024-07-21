<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'dokter_id',
        'nama_dokter',
        'email',
        'pasword',
        'foto_profil',
        'spesialis',
        'phone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_virified_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::Class,'dokter_id');
    }
    
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'dokter_id');
    }

}
