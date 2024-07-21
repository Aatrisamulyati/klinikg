<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Services extends Model
{
    use HasFactory;

    // protected $fillable = ['nama_services', 'harga'];

    protected $guarded = [];
    
    public function products()
    {
        // return $this->belongsToMany(Product::class, 'services', 'service_id', 'product_id');
        return $this->hasMany(Product::class);
    }
}
