<?php

namespace App\Livewire\Frontend\User;

use Livewire\Component;

class Homework extends Component
{
    public function render()
    {
        return view('livewire.frontend.user.homework')->layout('livewire.layout.user-app');
    }
}
