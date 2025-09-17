<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'due_date',
        'max_points',
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'max_points' => 'integer',
    ];

    // Relationship with course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relationship with submissions
    public function submissions()
    {
        return $this->hasMany(AssignmentSubmission::class);
    }

    // Check if assignment is overdue
    public function isOverdue()
    {
        return $this->due_date && now()->greaterThan($this->due_date);
    }
}
