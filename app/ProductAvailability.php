<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAvailability extends Model
{
    protected $fillable = [
        'product_id', 'date_start', 'date_end'
    ];

    protected $dates = [
        'date_start', 'date_end'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
