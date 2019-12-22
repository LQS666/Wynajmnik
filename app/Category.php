<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'sub', 'slug', 'name', 'desc', 'visible'
    ];

    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
