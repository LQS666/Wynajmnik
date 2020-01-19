<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    private const TYPES = [
        'text', 'int', 'decimal'
    ];

    protected $fillable = [
        'name', 'type', 'visible'
    ];

    public static function getType($string = false)
    {
        return $string ? implode(',', self::TYPES) : self::TYPES;
    }

    public function values()
    {
        return $this->hasMany(FilterValue::class);
    }
}
