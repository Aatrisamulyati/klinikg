<?php

namespace App\Models;

use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $guarded=[];
    
    public function pasien(){
        return $this-> belongsTo(Pasien::class, 'pasien_id');
    }

    public function dokter(){
        return $this-> belongsTo(Dokter::class, 'dokter_id');
    }

    public function service(){
        return $this-> belongsTo(Service::class, 'service_id');
    }

}   
