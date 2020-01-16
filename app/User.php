<?php

namespace App;

use App\Events\ImageHandleOnUpdate;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'birth_date', 'avatar', 'points', 'register_ip', 'last_login_ip', 'last_login_at', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth_date' => 'date',
        'last_login_at' => 'datetime'
    ];

    protected $dispatchesEvents = [
        'updated' => ImageHandleOnUpdate::class
    ];

    protected const FREE_ADD_LIMIT = 5;

    public $dir = 'avatars';

    public $images = [
        'avatar'
    ];

    public function getPointsAttribute($value)
    {
        return (int) $value;
    }

    public function getFreeAddCountAttribute()
    {
        $count = self::FREE_ADD_LIMIT - count($this->products);
        return $count > 0 ? $count : 0;
    }

    public function getAdminAttribute()
    {
        return $this->id === 1;
    }

    public function addresses() {
        return $this->hasMany(UserAddress::class);
    }

    public function offers() {
        return $this->hasMany(Offer::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function points() {
        return $this->hasMany(Point::class);
    }
}
