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
        'name', 'surname', 'birth_date', 'avatar', 'register_ip', 'last_login_ip', 'last_login_at', 'email', 'password',
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

    public $dir = 'avatars';

    public $images = [
        'avatar'
    ];

    public function addresses() {
        return $this->hasMany(UserAddress::class);
    }
}
