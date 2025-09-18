<div>
    @section('title')
        <title>Profile</title>
    @endsection

    @section('css')

    @endsection

    <div class="dashboard-header">
        <h1 class="dashboard-title">Profile</h1>
    </div>
    <div class="dashboard-cards">
            <div class="card">
                <div class="user-header">
                    <div class="user-avatar">{{ substr(auth()->user()->first_name, 0, 1) }}{{ substr(auth()->user()->last_name, 0, 1) }}</div>
                    <div>
                        <div class="user-name">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
                        <div class="user-id">ID: {{auth()->user()->unique_id}}</div>
                    </div>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-wallet"></i> Balance</span>
                    <span class="info-value">{{auth()->user()->balance}}</span>
                </div>

                <a href="#" class="btn btn-outline btn-sm">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="text-3xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="m18 8 4 4-4 4-1.41-1.41L18.17 13H13v-2h5.17l-1.59-1.59L18 8zM7 1.01 17 1c1.1 0 2 .9 2 2v4h-2V6H7v12h10v-1h2v4c0 1.1-.9 2-2 2H7c-1.1 0-2-.9-2-2V3c0-1.1.9-1.99 2-1.99zM7 21h10v-1H7v1zM7 4h10V3H7v1z"></path></svg>
                    Balance Transfer
                </a>

                <div class="card-divider"></div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-status"></i> Status</span>
                    <span class="status-active">{{auth()->user()->status}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-calendar-alt"></i> Member Since</span>
                    <span class="info-value">{{date('M j, Y', strtotime(auth()->user()->created_at))}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-gift"></i> Referral Code</span>
                    <span class="referral-code">{{auth()->user()->unique_id}}</span>
                </div>

                <div class="card-actions">
                    <a href="#" class="btn btn-outline btn-sm">
                        <i class="fas fa-copy"></i> Copy My Referral Code
                    </a>
                    <a href="#" class="btn btn-success btn-sm">
                        <i class="fas fa-unlock"></i> Account Activate
                    </a>
                    <a href="#" class="btn btn-info btn-sm">
                        <i class="fas fa-link"></i> Copy My Referral Link
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">About</h3>
                    <div class="card-icon">
                        <i class="fas fa-user-circle"></i>
                    </div>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-user"></i> Full Name</span>
                    <span class="info-value">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-envelope"></i> Email</span>
                    <span class="info-value">{{auth()->user()->email}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-phone"></i> Contact No</span>
                    <span class="info-value">{{auth()->user()->whatsapp_number}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-globe"></i> Country</span>
                    <span class="info-value">{{auth()->user()->country}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-language"></i> Language</span>
                    <span class="info-value">{{auth()->user()->language}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-id-card"></i> Student ID</span>
                    <span class="info-value">{{auth()->user()->unique_id}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-id-badge"></i> ID</span>
                    <span class="info-value">{{auth()->user()->unique_id}}</span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="fas fa-file-alt"></i> Reference No</span>
                    <span class="info-value">{{auth()->user()->reference_no}}</span>
                </div>
            </div>
        </div>
   @section('js')

   @endsection
</div>
