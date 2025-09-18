<?php

namespace App\Livewire\Frontend\User;

use Livewire\Component;

class Referral extends Component
{
    public function render()
    {
        return view('livewire.frontend.user.referral')->layout('livewire.layout.user-app');
    }
}
