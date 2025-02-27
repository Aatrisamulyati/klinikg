<?php

namespace App\Models;

use App\Models\Dokter;
use App\Models\Pasien;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = [];

    public function pasien()
    {
    	return $this->hasOne(Pasien::class, 'user_id');
    }
    public function dokter()
    {
    	return $this->hasOne(Dokter::class, 'user_id');
    }


    // public function booking(){
    //     return $this-> hasMany(Booking::class);
    // }
}
