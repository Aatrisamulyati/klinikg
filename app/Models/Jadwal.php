<?php

namespace App\Models;

use App\Models\Dokter;
use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'dokter_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'status',
    ];
    
    public function dokter(){
        return $this-> belongsTo(Dokter::class, 'dokter_id');
    }
}
