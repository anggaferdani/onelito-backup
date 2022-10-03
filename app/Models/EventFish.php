<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFish extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'm_ikan_lelang';
    protected $primaryKey = 'id_ikan';

    public function photo()
    {
        return $this->hasOne(FishPhoto::class, 'id_ikan');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
}
