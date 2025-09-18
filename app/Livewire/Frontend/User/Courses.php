<?php

namespace App\Livewire\Frontend\User;

use Livewire\Component;

class Courses extends Component
{
    public function render()
    {
        return view('livewire.frontend.user.courses')->layout('livewire.layout.user-app');
    }
}
