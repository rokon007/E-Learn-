<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h3>User Dashboard</h3>
    </div>
    <ul class="sidebar-menu">
        <li>
            <a href="{{route('dashboard')}}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
               <i class="fas fa-th-large"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Home
            </a>
        </li>
        <li>
            <a href="{{route('profile')}}"
               class="{{ request()->routeIs('profile') ? 'active' : '' }}">
               <i class="fas fa-user"></i> My Profile
            </a>
        </li>
        <li>
            <a href="{{route('leadconverts')}}"
               class="{{ request()->routeIs('leadconverts') ? 'active' : '' }}">
               <i class="fas fa-exchange-alt"></i> Lead Convert
            </a>
        </li>
        <li>
            <a href="{{route('passbook')}}"
               class="{{ request()->routeIs('passbook') ? 'active' : '' }}">
               <i class="fas fa-wallet"></i> PassBook
            </a>
        </li>
        <li>
            <a href="{{route('courses')}}"
               class="{{ request()->routeIs('courses') ? 'active' : '' }}">
               <i class="fas fa-book"></i> Courses
            </a>
        </li>
        <li>
            <a href="{{route('referral')}}"
               class="{{ request()->routeIs('referral') ? 'active' : '' }}">
               <i class="fas fa-users"></i> Referral
            </a>
        </li>
        <li>
            <a href="{{route('withdrawal')}}"
               class="{{ request()->routeIs('withdrawal') ? 'active' : '' }}">
               <i class="fas fa-money-bill-wave"></i> Withdrawal
            </a>
        </li>
        <li>
            <a href="{{route('changepassword')}}"
               class="{{ request()->routeIs('changepassword') ? 'active' : '' }}">
               <i class="fas fa-key"></i> Change Password
            </a>
        </li>
        <li>
            <a href="{{route('homework')}}"
               class="{{ request()->routeIs('homework') ? 'active' : '' }}">
               <i class="fas fa-tasks"></i> Homework
            </a>
        </li>
        <li>
            <a href="{{route('buyoffer')}}"
               class="{{ request()->routeIs('buyoffer') ? 'active' : '' }}">
               <i class="fas fa-gift"></i> Buy Offer
            </a>
        </li>
        <li>
            <a style="cursor: pointer;" wire:click="$dispatch('logout')">
               <i class="fas fa-lock"></i> Logout
            </a>
        </li>
    </ul>
</aside>
