<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = [
        'user_id', 'sign', 'points', 'source', 'result', 'operation', 'desc'
    ];

    public function getPointsAttribute($value)
    {
        return (int) $value;
    }

    public function scopeUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function owner()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
