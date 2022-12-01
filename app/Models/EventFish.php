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

    public function bids()
    {
        return $this->hasMany(LogBid::class, 'id_ikan_lelang')->where('status_aktif', 1)
        ->orderBy('nominal_bid', 'desc');
    }

    public function maxBid()
    {
        return $this->hasOne(LogBid::class, 'id_ikan_lelang')->where('status_aktif', 1)
            ->orderBy('nominal_bid', 'desc');
    }

    public function winners()
    {
        return $this->hasManyThrough(AuctionWinner::class, LogBid::class, 'id_ikan_lelang', 'id_bidding')
        ->where('t_pemenang_lelang.status_aktif', 1);
    }

    public function members()
    {
        return $this->hasManyThrough(Member::class, LogBid::class, 'id_ikan_lelang', 'id_peserta')
        ->where('m_peserta.status_aktif', 1);
    }
}
