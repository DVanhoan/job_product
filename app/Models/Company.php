<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CompanyCategory;
use App\Models\Post;

class Company extends Model
{
    use HasFactory;

    public function getCategory()
    {
        return $this->hasOne(CompanyCategory::class, 'id', 'company_category_id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function followers()
    {
        return $this->hasMany(Follow::class, 'company_id');
    }

    public function isFollowedBy($userId)
    {
        return $this->followers()->where('follower_id', $userId)->exists();
    }

    public function followersCount()
    {
        return $this->followers()->count();
    }

    public function approvedPosts()
    {
        return $this->posts()->where('approved', true);
    }

    public function getFollowStatus($userId)
    {
        $follow = $this->followers()->where('follower_id', $userId)->first();
        return $follow ? $follow->status : null;
    }
}
