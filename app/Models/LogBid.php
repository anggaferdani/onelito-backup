<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBid extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 't_log_bidding';
    protected $primaryKey = 'id_bidding';

    public function eventFish()
    {
        return $this->belongsTo(EventFish::class, 'id_ikan_lelang');
    }
}
