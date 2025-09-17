<div>
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
    <a href="#" class="logo">
        <i class="fas fa-graduation-cap" style="margin-right: 10px; margin-left: 20px"></i>E-Learn
    </a>
    <ul class="nav-links">
        <li><a href="#">Home1</a></li>
        <li><a href="#services">Services1</a></li>
        <li><a href="#faq">FAQ1</a></li>
        <li><a href="#contact">Contact1</a></li>
    </ul>

    <div class="auth-buttons" style="margin-right: 20px;">
        @auth
            <a href="{{ url('/dashboard') }}" class="btn">Dashboard</a>
            <a style="cursor: pointer;" wire:click="logout" class="btn btn-outline" >Logout</a>
        @else
            <a href="#" class="btn btn-outline" id="login-btn">Login</a>

            @if (Route::has('register'))
                <a href="#" class="btn" id="register-btn">Sign Up</a>
            @endif
        @endauth
    </div>

    <div class="menu-toggle" id="menu-toggle">
        <span style="color: white;"></span>
        <span style="color: white;"></span>
        <span style="color: white;"></span>
    </div>
</nav>
</div>
