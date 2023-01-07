<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = [
        'username',
        'user_avatar',
        'last_seen_time'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'seen_at' => 'datetime',
    ];

    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class, 'conversation_id', 'id');
    }

    public function getLastSeenTimeAttribute()
    {
        return $this->seen_at
            ? $this->seen_at->diffForHumans()
            : null;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getUserNameAttribute(): string
    {
        return $this->user->name;
    }
    public function getUserAvatarAttribute(): string
    {
        return $this->user->user_avatar;
    }
}
