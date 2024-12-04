<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
    ];

    public function members()
    {
        return $this->hasMany(ConversationMember::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class)->latest('created_at');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'conversation_members')
            ->withPivot('is_admin', 'joined_at')
            ->withTimestamps();
    }

    public function latestMessage()
    {
        return $this->hasOne(Message::class)->with('sender')->latest('updated_at');
    }

    public function getOtherParticipantAttribute()
    {
        $authUserId = auth()->id();
        return $this->members()
            ->where('user_id', '!=', $authUserId)
            ->first()?->user;
    }
}
