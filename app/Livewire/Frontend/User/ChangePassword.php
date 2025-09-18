<?php

namespace App\Livewire\Frontend\User;

use Livewire\Component;

class ChangePassword extends Component
{
    public function render()
    {
        return view('livewire.frontend.user.change-password')->layout('livewire.layout.user-app');
    }
}
