<?php

namespace App\Livewire\Frontend\Landing;

use Livewire\Component;

class Welcome extends Component
{
    public function render()
    {
        return view('livewire.frontend.landing.welcome')->layout('livewire.layout.landing-app');
    }
}
