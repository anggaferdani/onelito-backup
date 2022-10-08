<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'm_produk';
    protected $primaryKey = 'id_produk';

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'id_kategori_produk');
    }

    public function photo()
    {
        return $this->hasOne(ProductPhoto::class, 'id_produk');
    }
}
