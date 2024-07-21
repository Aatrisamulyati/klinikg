<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    
    protected $guarded=[];
    public function transaksi()
    {
        return $this->belongsTo(Booking::class, 'dokter_id');
    }

}
