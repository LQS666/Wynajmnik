<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'sub', 'slug', 'name', 'desc', 'visible'
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function scopeMaincategories($query, $value = null) {
        return $query->where('sub', '=', $value)->where('visible', true);
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }

    public function subcategories() {
        return $this->hasMany(Category::class, 'sub')->where('visible', true);
    }
}
