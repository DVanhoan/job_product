<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Company;
use App\Models\Post;
use App\Models\JobApplication;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'github_id',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function applied()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class, 'conversation_members')
            ->withPivot('is_admin', 'joined_at')
            ->withTimestamps();
    }


    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function messageStatuses()
    {
        return $this->hasMany(MessageStatus::class);
    }

    public function getAvatarAttribute()
    {
        return $this->attributes['avatar'] ?? '/default-avatar.jpg';
    }
}
