<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'referrer_id',
        'referred_id',
        'bonus_amount',
        'status',
    ];

    protected $casts = [
        'bonus_amount' => 'decimal:2',
    ];

    // Relationship with referrer
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    // Relationship with referred user
    public function referred()
    {
        return $this->belongsTo(User::class, 'referred_id');
    }

    // Referral statuses
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    // Scope for pending referrals
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    // Scope for approved referrals
    public function scopeApproved($query)
    {
        return $query->where('status', self::STATUS_APPROVED);
    }
}
