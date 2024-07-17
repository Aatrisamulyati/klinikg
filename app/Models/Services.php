<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Services;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_services',
        'product_id',
        'harga',
    ];
    
    public function product(){
        return $this-> belongsTo(Product::class, 'product_id');
    }
}
