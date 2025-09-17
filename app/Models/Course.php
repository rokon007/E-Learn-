<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'trainer_id',
        'price',
        'image',
        'duration',
        'level',
        'category',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Relationship with trainer
    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }

    // Relationship with enrolled users
    public function enrolledUsers()
    {
        return $this->belongsToMany(User::class, 'course_user')
                    ->withPivot('progress', 'enrolled_at')
                    ->withTimestamps();
    }

    // Relationship with lessons
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    // Relationship with assignments
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    // Calculate average progress for all enrolled users
    public function averageProgress()
    {
        return $this->enrolledUsers()->avg('progress') ?? 0;
    }

    // Get enrolled users count
    public function enrolledUsersCount()
    {
        return $this->enrolledUsers()->count();
    }
}
