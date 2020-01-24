<?php

namespace App;

use App\Services\GlobalService;
use Illuminate\Database\Eloquent\Model;

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
        $this->attributes['slug'] = GlobalService::generateSlug($value, $this);
    }
}
