<?php

namespace App;

use App\Services\PayUService;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'amount', 'desc', 'client_ip', 'session_id', 'ts', 'sig', 'status', 'error', 'returned'
    ];

    public function scopeUser($query, $user_id) {
        return $query->where('user_id', $user_id);
    }

    public function getOrderIdAttribute() {
        return $this->id;
    }

    public function getAmountAttribute($value) {
        return (int) $value;
    }

    public function getErrorAttribute($value) {
        return PayUService::getError($value) ? [$value => PayUService::getError($value)] : $value;
    }

    public function getStatusAttribute($value) {
        return PayUService::getStatus($value) ? [$value => PayUService::getStatus($value)] : $value;
    }
}
