<aside class="sidebar-wrapper sidebar-theme" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            @php
                $logoPath = \App\Models\SystemSetting::where('key', 'shop_logo')->value('value');
            @endphp

            @if($logoPath && Storage::disk('public')->exists($logoPath))
                <img src="{{ asset('storage/app/public/' . $logoPath) }}" class="logo-icon" alt="shop logo">
            @else
                <img src="{{ asset('assets/img/logo.svg') }}" class="logo-icon" alt="default logo">
            @endif
        </div>
        <div>
            <h4 class="logo-text">D-SMS</h4>
        </div>
        <div class="toggle-icon ms-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11,17 6,12 11,7"></polyline><polyline points="18,17 13,12 18,7"></polyline></svg>
        </div>
    </div>
    <!-- Navigation -->
    <ul class="metismenu menu-categories" id="menu">
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class="bi bi-house-door"></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li class="{{ request()->routeIs('users.*') || request()->routeIs('roles.*') ? 'active' : '' }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-people"></i></div>
                <div class="menu-title">User Management</div>
            </a>
            {{-- <ul>
                <li class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}"><i class="bi bi-arrow-right-short"></i>Users</a>
                </li>
                <li class="{{ request()->routeIs('roles.*') ? 'active' : '' }}">
                    <a href="{{ route('roles.index') }}"><i class="bi bi-arrow-right-short"></i>Roles & Permissions</a>
                </li>
            </ul> --}}
        </li>


    </ul>
</aside>
