<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilterValue extends Model
{
    protected $fillable = [
        'filter_id', 'value', 'value_string', 'value_int', 'value_decimal'
    ];

    public function setValueAttribute($value) {
        $this->attributes['value'] = $value;
        $this->attributes['value_string']  = (string) $value;
        $this->attributes['value_int']     = (int) $value;
        $this->attributes['value_decimal'] = (float) $value;
    }

    public function filter() {
        return $this->belongsTo(Filter::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
