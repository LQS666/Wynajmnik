<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Site extends Model
{
    protected $fillable = [
        'slug', 'name', 'content', 'author', 'visible'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        $slug = Str::slug($value);

        if (Site::where('slug', $slug)->first()) {
            $this->attributes['slug'] = time() . '-' . $slug;
        } else {
            $this->attributes['slug'] = Str::slug($slug);
        }
    }
}
