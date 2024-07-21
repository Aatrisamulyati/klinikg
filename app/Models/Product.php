<?php

namespace App\Models;

use App\Models\Services;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_product',
        'gambar',
        'harga_satuan',
        'stok',
    ];

    public function service(){
        return $this-> belongsTo(Service::class, 'product_id');
    } 
}
