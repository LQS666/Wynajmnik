<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'slug', 'name', 'desc', 'price', 'premium', 'visible'
    ];

    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function availabilities() {
        return $this->hasMany(ProductAvailability::class);
    }

    public function pictures() {
        return $this->hasMany(ProductPicture::class);
    }

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
