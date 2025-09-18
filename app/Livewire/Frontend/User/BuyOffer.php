<?php

namespace App\Livewire\Frontend\User;

use Livewire\Component;

class BuyOffer extends Component
{
    public function render()
    {
        return view('livewire.frontend.user.buy-offer')->layout('livewire.layout.user-app');
    }
}
