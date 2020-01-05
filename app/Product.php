<?php

namespace App;

use App\Events\ImageHandleOnDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'user_id', 'user_address_id', 'slug', 'name', 'desc', 'price', 'premium', 'visible'
    ];

    protected $dispatchesEvents = [
        'deleting' => ImageHandleOnDelete::class
    ];

    public function scopeUser($query, $user_id) {
        return $query->where('user_id', $user_id);
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function availabilities() {
        return $this->hasMany(ProductAvailability::class);
    }

    public function images() {
        return $this->hasMany(ProductPicture::class);
    }

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function offers() {
        return $this->hasMany(Offer::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function filterValues() {
        return $this->belongsToMany(FilterValue::class);
    }
}
