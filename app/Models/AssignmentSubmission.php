<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'assignment_id',
        'user_id',
        'submission_text',
        'submission_file',
        'submitted_at',
        'points',
        'feedback',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'points' => 'integer',
    ];

    // Relationship with assignment
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    // Relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Check if submission is graded
    public function isGraded()
    {
        return !is_null($this->points);
    }

    // Calculate grade percentage
    public function gradePercentage()
    {
        if (!$this->isGraded() || $this->assignment->max_points == 0) {
            return 0;
        }

        return ($this->points / $this->assignment->max_points) * 100;
    }
}
