<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'id_user', 'street', 'home_number', 'apartment_number', 'city', 'zip_code', 'latitude', 'longitude'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
