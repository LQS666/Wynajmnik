<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'sub', 'slug', 'name', 'desc', 'visible'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        $slug = Str::slug($value);

        if (Category::where('slug', $slug)->first()) {
            $this->attributes['slug'] = time() . '-' . $slug;
        } else {
            $this->attributes['slug'] = Str::slug($slug);
        }
    }

    public function scopeMaincategories($query, $value = null)
    {
        return $query->where('sub', $value);
    }

    public function scopeVisible($query)
    {
        return $query->where('visible', true);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'sub');
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'sub');
    }
}
