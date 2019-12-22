<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $fillable = [
        'name', 'type', 'visible'
    ];

    public function values() {
        return $this->hasMany(FilterValue::class);
    }
}
