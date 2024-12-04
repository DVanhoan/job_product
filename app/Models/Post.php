<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Company;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'job_title',
        'job_level',
        'vacancy_count',
        'employment_type',
        'job_location',
        'salary',
        'deadline',
        'education_level',
        'experience',
        'skills',
        'specifications'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function deadlineTimestamp()
    {
        return Carbon::parse($this->deadline)->timestamp;
    }

    public function remainingDays()
    {
        $deadline = $this->deadline;
        $timestamp = Carbon::parse($deadline)->timestamp - Carbon::now()->timestamp;
        return $timestamp;
    }

    public function getSkills()
    {
        return explode(',', $this->skills);
    }
}
