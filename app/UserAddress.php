<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'user_id', 'street', 'home_number', 'apartment_number', 'city', 'zip_code', 'latitude', 'longitude'
    ];

    public function scopeUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
