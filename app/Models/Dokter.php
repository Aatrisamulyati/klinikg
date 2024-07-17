<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_dokter',
        'spesialis',
        'phone',
    ];
    
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'dokter_id');
    }

}
