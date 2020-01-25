<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddress extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'street', 'home_number', 'apartment_number', 'city', 'zip_code', 'phone', 'latitude', 'longitude'
    ];

    public function scopeUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
