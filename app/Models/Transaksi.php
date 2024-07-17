<?php

namespace App\Models;

use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'tgl_transaksi',
        'total',
        'status',
    ];
    
    public function pasien(){
        return $this-> belongsTo(Pasien::class, 'pasien_id');
    }

    public function dokter(){
        return $this-> belongsTo(Dokter::class, 'dokter_id');
    }

    
}   
