<?php

namespace App\Livewire\Frontend\User;

use Livewire\Component;

class PassBook extends Component
{
    public function render()
    {
        return view('livewire.frontend.user.pass-book')->layout('livewire.layout.user-app');
    }
}
