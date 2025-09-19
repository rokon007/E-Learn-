<?php

namespace App\Livewire\Frontend\User;

use Livewire\Component;
use App\Models\User;

class Referral extends Component
{
    public $referrals;

    public function mount()
    {
        // Get users who registered with the current user's referral code
        $this->referrals = User::where('reference_no', auth()->user()->unique_id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.frontend.user.referral')->layout('livewire.layout.user-app');
    }
}
