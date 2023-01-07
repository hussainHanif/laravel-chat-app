<?php

namespace App\Models;

use App\Helpers\Helpers;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Psr\SimpleCache\InvalidArgumentException;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $appends = ['user_avatar', 'is_online', 'last_active_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUserAvatarAttribute(): string
    {
        $name = urlencode($this->name);
        return "https://ui-avatars.com/api/?background=d5d3f8&color=7269ef&name=$name";
    }

    /**
     * @throws InvalidArgumentException
     */
    public function getIsOnlineAttribute(): bool
    {
        return cache()->has("is_online$this->id");
    }

    public function getLastActiveAtAttribute()
    {
        return Helpers::getLastActiveAt($this->id);
    }
}
