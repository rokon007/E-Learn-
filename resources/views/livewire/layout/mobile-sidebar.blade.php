<div>
    <?php

        use App\Livewire\Actions\Logout;
        use Livewire\Volt\Component;

        new class extends Component
        {
            /**
             * Log the current user out of the application.
             */
            public function logout(Logout $logout): void
            {
                $logout();

                $this->redirect('/', navigate: true);
            }
        }; ?>
        <div class="mobile-sidebar" id="mobile-sidebar">
            <button class="sidebar-close" id="sidebar-close">
                <i class="fas fa-times"></i>
            </button>
            <ul class="sidebar-links">
                <li><a href="#">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#faq">FAQ</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>

            <div class="sidebar-auth">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn">Dashboard</a>
                    <a style="cursor: pointer;" wire:click="$dispatch('logout')" class="btn btn-outline" >Logout</a>
                @else
                    <a href="#" class="btn btn-outline" id="sidebar-login-btn">Login</a>

                    @if (Route::has('register'))
                        <a href="#" class="btn" id="sidebar-register-btn">Sign Up</a>
                    @endif
                @endauth
                {{-- <a href="#" class="btn btn-outline" id="sidebar-login-btn">Login</a>
                <a href="#" class="btn" id="sidebar-register-btn" style="margin-top: 10px;">Sign Up</a> --}}
            </div>
    </div>
</div>
