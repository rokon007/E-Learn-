<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'content',
        'video_url',
        'duration',
        'order',
        'is_free',
    ];

    protected $casts = [
        'is_free' => 'boolean',
    ];

    // Relationship with course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relationship with completed lessons by users
    public function completedUsers()
    {
        return $this->belongsToMany(User::class, 'lesson_user')
                    ->withTimestamps();
    }

    // Check if a user has completed this lesson
    public function isCompletedByUser($userId)
    {
        return $this->completedUsers()->where('user_id', $userId)->exists();
    }
}
