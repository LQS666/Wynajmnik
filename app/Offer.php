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
        /*'date_start', 'date_end', */'accepted_at', 'rejected_at'
    ];

    public function getDateStartAsDateAttribute()
    {
        return Carbon::parse($this->date_start);
    }

    public function getDateEndAsDateAttribute()
    {
        return Carbon::parse($this->date_end);
    }

    public function getDateStartWithTimeAttribute()
    {
        return Carbon::parse($this->date_start)->startOfDay();
    }

    public function getDateEndWithTimeAttribute()
    {
        return Carbon::parse($this->date_end)->endofDay();
    }

    public function getStatusAttribute()
    {
        if (!is_null($this['accepted_at'])) {
            return trans('dashboard/offer.accepted');
        }

        if (!is_null($this['rejected_at'])) {
            return trans('dashboard/offer.rejected');
        }

        if (!is_null($this['deleted_at'])) {
            return trans('dashboard/offer.cancelled');
        }

        return trans('dashboard/offer.waiting');
    }

    public function getIsUnhandledAttribute()
    {
        return (!is_null($this['accepted_at']) || !is_null($this['rejected_at']));
    }

    public function getIsCancelledAttribute()
    {
        return !is_null($this['deleted_at']);
    }

    public function scopeUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function scopeProd($query, $product_id)
    {
        return $query->where('product_id', $product_id);
    }

    public function scopeNew($query)
    {
        return $query->whereRaw('`offers`.`date_end` >= CURDATE()');
    }

    public function scopeOld($query)
    {
        return $query->whereRaw('`offers`.`date_end` < CURDATE()');
    }

    public function scopeUnhandled($query)
    {
        return $query->where('accepted_at', null)->where('rejected_at', null);
    }

    public function scopeAccepted($query)
    {
        return $query->where('accepted_at', '!=', null);
    }

    public function scopeRejected($query)
    {
        return $query->where('rejected_at', '!=', null);
    }

    public function scopeCancelled($query)
    {
        return $query->where('deleted_at', '!=', null);
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
