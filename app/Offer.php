<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Offer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'product_id', 'price', 'date_start', 'date_end', 'note', 'accepted_at', 'rejected_at'
    ];

    protected $dates = [
        'accepted_at', 'rejected_at'
    ];

    public function getDateStartFullAttribute($value)
    {
        return Carbon::parse($value)->startOfDay();
    }

    public function getDateEndFullAttribute($value)
    {
        return Carbon::parse($value)->endofDay();
    }

    public function scopeUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function scopeProd($query, $product_id)
    {
        return $query->where('product_id', $product_id);
    }

    public function scopeFromToday($query)
    {
        return $query->whereRaw('`offers`.`date_end` >= CURDATE()');
    }

    public function scopeUnhandled($query)
    {
        return $query->where('accepted_at', null)->where('rejected_at', null);
    }

    public function scopeAccepted($query)
    {
        return $query->where('accepted_at', '!=', null);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
