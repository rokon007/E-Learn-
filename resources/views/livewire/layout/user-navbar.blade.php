<?php

use App\Livewire\Actions\Logout;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */

    #[On('logout')]
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>
<nav class="navbar">
    <button class="sidebar-toggle" id="sidebar-toggle">
        <i class="fas fa-bars"></i>
    </button>
    <a href="#" class="logo">
        <i class="fas fa-graduation-cap" style="margin-right: 10px; margin-left: 20px"></i>E-Learn
    </a>
    <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li><a href="index.html#services">Services</a></li>
        <li><a href="index.html#faq">FAQ</a></li>
        <li><a href="index.html#contact">Contact</a></li>
    </ul>

    <div class="auth-buttons" style="margin-right: 20px;">
        <button wire:click="logout" class="btn btn-outline">Logout</button>
    </div>

    <div class="menu-toggle" id="menu-toggle">
        <span style="color: white;"></span>
        <span style="color: white;"></span>
        <span style="color: white;"></span>
    </div>
</nav>
