<?php

namespace App\Livewire\Frontend\User;

use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.frontend.user.profile')->layout('livewire.layout.user-app');
    }
}
