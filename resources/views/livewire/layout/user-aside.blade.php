<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h3>User Dashboard</h3>
    </div>
    <ul class="sidebar-menu">
        <li><a href="{{route('dashboard')}}" class="active"><i class="fas fa-th-large"></i> Dashboard</a></li>
        <li><a href="/" class=""><i class="fas fa-home"></i> Home</a></li>
        <li><a href="{{route('profile')}}"><i class="fas fa-user"></i> My Profile</a></li>
        <li><a href="{{route('leadconverts')}}"><i class="fas fa-exchange-alt"></i> Lead Convert</a></li>
        <li><a href="{{route('passbook')}}"><i class="fas fa-wallet"></i> PassBook</a></li>
        <li><a href="{{route('courses')}}"><i class="fas fa-book"></i> Courses</a></li>
        <li><a href="{{route('referral')}}"><i class="fas fa-users"></i> Referral</a></li>
        <li><a href="{{route('withdrawal')}}"><i class="fas fa-money-bill-wave"></i> Withdrawal</a></li>
        <li><a href="{{route('changepassword')}}"><i class="fas fa-key"></i> Change Password</a></li>
        <li><a href="{{route('homework')}}"><i class="fas fa-tasks"></i> Homework</a></li>
        <li><a href="{{route('buyoffer')}}"><i class="fas fa-gift"></i> Buy Offer</a></li>
        <li><a style="cursor: pointer;"  wire:click="$dispatch('logout')"><i class="fas fa-lock"></i> Logout</a></li>
    </ul>
</aside>
