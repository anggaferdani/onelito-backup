<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'm_event';
    protected $primaryKey = 'id_event';

    // kategori_event
    public const SPECIAL = 'Special';
    public const REGULAR = 'Regular';

    public function auctionProducts()
    {
        return $this->hasMany(EventFish::class, 'id_event')->where('status_aktif', 1);
    }
}
