<?php

namespace App;

use App\Services\GlobalService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Site extends Model
{
    protected $fillable = [
        'slug', 'name', 'group', 'alias', 'content', 'author', 'visible'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getLinkAttribute()
    {
        return $this['alias'] ?
            (Str::startsWith($this['alias'], 'http') ? $this['alias'] : 'https://' . $this['alias']) :
                route('web.site', ['site' => $this]);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = GlobalService::generateSlug($value, $this);
    }

    public function scopeVisible($query)
    {
        return $query->where('visible', true);
    }

    public function scopeGroup($query)
    {
        return $query->where('group', '!=', null);
    }
}
