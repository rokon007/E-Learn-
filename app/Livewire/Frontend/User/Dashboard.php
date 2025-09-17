<?php

namespace App\Livewire\Frontend\User;

use Livewire\Component;
use App\Models\User;

class Dashboard extends Component
{
    public $pendingMode=false;

    public function mount()
    {
        if(auth()->user()->status=='pending'){
            $this->pendingMode=true;
        }
    }

    public function render()
    {
        return view('livewire.frontend.user.dashboard')->layout('livewire.layout.user-app');
    }
}
