<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'product_id', 'desc', 'price', 'date_start', 'date_end', 'accepted_at', 'rejected_at'
    ];

    protected $dates = [
        'date_start', 'date_end', 'accepted_at', 'rejected_at'
    ];

    public function scopeUser($query, $user_id) {
        return $query->where('user_id', $user_id);
    }

    public function scopeProduct($query, $product_id) {
        return $query->where('product_id', $product_id);
    }

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
