<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'address_shipping',
        'address_billing',
        'username',
        'role',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function address()
    {
        return $this->hasOne(UserAddress::class, 'user_id');
    }

    public function seller()
    {
        return $this->hasOne(SellersProfile::class, 'user_id');
    }

    public function getAttributeName()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function uploads()
    {
        return $this->belongsTo(Upload::class, 'avatar', 'id')->withDefault([
            'file_name' => "avatar.png",
            'id' => null,
        ]);
    }
}