<?php

namespace App\Livewire\Frontend\User;

use Livewire\Component;

class Notification extends Component
{
    public function render()
    {
        return view('livewire.frontend.user.notification')->layout('livewire.layout.user-app');
    }
}
