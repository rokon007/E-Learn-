<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'country',
        'language',
        'whatsapp_number',
        'email',
        'reference_no',
        'balance',
        'password',
        'status',
        'unique_id',
        'role', // admin, trainer, student
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationship with referred users
    public function referrals()
    {
        return $this->hasMany(Referral::class, 'referrer_id');
    }

    // Relationship with the user who referred this user
    public function referrer()
    {
        return $this->belongsTo(User::class, 'reference_no', 'unique_id');
    }

    // Relationship with transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // Relationship with courses as trainer
    public function trainerCourses()
    {
        return $this->hasMany(Course::class, 'trainer_id');
    }

    // Relationship with enrolled courses
    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'course_user')
                    ->withPivot('progress', 'enrolled_at')
                    ->withTimestamps();
    }

    // Check if user is admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Check if user is trainer
    public function isTrainer()
    {
        return $this->role === 'trainer';
    }

    // Check if user is student
    public function isStudent()
    {
        return $this->role === 'student';
    }

    // Get full name
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
