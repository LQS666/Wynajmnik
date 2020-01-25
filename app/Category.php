<?php

namespace App;

use App\Services\GlobalService;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'sub', 'slug', 'name', 'desc', 'visible'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSubCountAttribute()
    {
        return count($this->subcategories);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = GlobalService::generateSlug($value, $this);
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

    public function filters()
    {
        return $this->belongsToMany(Filter::class);
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
