<?php

namespace App;

use App\Services\PayUService;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'amount', 'desc', 'client_ip', 'session_id', 'ts', 'sig', 'transaction_id', 'status', 'error', 'returned'
    ];

    public function getOrderIdAttribute()
    {
        return $this->id;
    }

    public function getAmountAttribute($value)
    {
        return (int) $value;
    }

    public function getErrorAttribute($value)
    {
        return PayUService::getError($value) ? [$value => PayUService::getError($value)] : $value;
    }

    public function getErrorIdAttribute()
    {
        $error = $this->error;
        return (int) (is_array($error) ? key($error) : $error);
    }

    public function getStatusAttribute($value)
    {
        return PayUService::getStatus($value) ? [$value => PayUService::getStatus($value)] : $value;
    }

    public function getStatusIdAttribute()
    {
        $status = $this->status;
        return (int) (is_array($status) ? key($status) : $status);
    }

    public function scopeUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
