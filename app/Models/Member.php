<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Member extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    protected $table = 'm_peserta';
    protected $primaryKey = 'id_peserta';

    protected $hidden = [
        'password',
    ];

    /**
     * Password need to be all time encrypted.
     *
     * @param string $password
     */

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinsi');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'kota');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'kecamatan');
    }

    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class, 'kelurahan');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'id_peserta');
    }
}
