<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 't_order';
    protected $primaryKey = 'id_order';

    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'id_order');
    }
}
