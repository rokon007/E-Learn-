<div>
    @section('title')
        <title>Referral</title>
    @endsection

    @section('css')
        <style>
            .referral-header {
                text-align: center;
                margin-bottom: 30px;
            }

            .referral-title {
                font-size: 2.2rem;
                color: var(--text-dark);
                margin-bottom: 10px;
                position: relative;
                display: inline-block;
            }

            .referral-title::after {
                content: '';
                position: absolute;
                bottom: -10px;
                left: 50%;
                transform: translateX(-50%);
                width: 60px;
                height: 4px;
                background: var(--accent-color);
                border-radius: 2px;
            }

            .referral-stats {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
                margin-bottom: 30px;
            }

            .stat-card {
                background: white;
                border-radius: 15px;
                padding: 25px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
                text-align: center;
                animation: fadeIn 0.6s ease forwards;
            }

            .stat-icon {
                width: 60px;
                height: 60px;
                border-radius: 50%;
                background: linear-gradient(135deg, var(--accent-color), #3b82f6);
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.5rem;
                margin: 0 auto 15px;
            }

            .stat-value {
                font-size: 2rem;
                font-weight: 700;
                color: var(--text-dark);
                margin-bottom: 5px;
            }

            .stat-label {
                color: #64748b;
                font-size: 1rem;
            }

            .referrals-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 25px;
                margin-bottom: 30px;
            }

            .referral-card {
                background: white;
                border-radius: 15px;
                padding: 25px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                animation: fadeIn 0.6s ease forwards;
                position: relative;
                overflow: hidden;
            }

            .referral-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
            }

            .user-avatar {
                width: 70px;
                height: 70px;
                border-radius: 50%;
                background: linear-gradient(135deg, var(--accent-color), #3b82f6);
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.8rem;
                font-weight: 600;
                margin: 0 auto 15px;
            }

            .user-name {
                font-size: 1.3rem;
                font-weight: 700;
                color: var(--text-dark);
                text-align: center;
                margin-bottom: 5px;
            }

            .user-id {
                color: var(--accent-color);
                font-weight: 600;
                text-align: center;
                margin-bottom: 15px;
                font-family: monospace;
                font-size: 0.9rem;
            }

            .user-details {
                margin-bottom: 15px;
            }

            .detail-item {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
                padding: 8px 12px;
                background-color: #f8fafc;
                border-radius: 8px;
            }

            .detail-item i {
                margin-right: 10px;
                color: var(--accent-color);
                width: 20px;
                text-align: center;
            }

            .detail-label {
                font-weight: 600;
                color: #64748b;
                margin-right: 8px;
                min-width: 80px;
            }

            .detail-value {
                color: var(--text-dark);
                flex: 1;
            }

            .status-badge {
                position: absolute;
                top: 20px;
                right: 20px;
                padding: 5px 12px;
                border-radius: 20px;
                font-size: 0.8rem;
                font-weight: 600;
            }

            .status-active {
                background-color: rgba(16, 185, 129, 0.1);
                color: #10b981;
            }

            .status-pending {
                background-color: rgba(245, 158, 11, 0.1);
                color: #f59e0b;
            }

            .empty-state {
                text-align: center;
                padding: 40px;
                background: white;
                border-radius: 15px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            }

            .empty-icon {
                font-size: 4rem;
                color: #cbd5e1;
                margin-bottom: 20px;
            }

            .empty-text {
                color: #64748b;
                font-size: 1.1rem;
                margin-bottom: 25px;
            }

            .btn-share {
                display: inline-flex;
                align-items: center;
                background: linear-gradient(135deg, var(--accent-color), #3b82f6);
                color: white;
                padding: 12px 25px;
                border-radius: 30px;
                text-decoration: none;
                font-weight: 600;
                font-size: 1rem;
                transition: all 0.3s ease;
                border: none;
                cursor: pointer;
                box-shadow: 0 5px 15px rgba(76, 132, 255, 0.3);
            }

            .btn-share:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 20px rgba(76, 132, 255, 0.4);
            }

            .btn-share i {
                margin-right: 8px;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            @media (max-width: 768px) {
                .referrals-grid {
                    grid-template-columns: 1fr;
                }

                .referral-stats {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    @endsection

    <div class="dashboard-header">
        <h1 class="dashboard-title">Referral</h1>
    </div>

    <div class="referral-header">
        <h2 class="referral-title">Your Referrals</h2>
        <p>Users who joined using your referral code: <strong>{{ auth()->user()->unique_id }}</strong></p>
    </div>

    <div class="referral-stats">
        <div class="stat-card animated">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value">{{ count($referrals) }}</div>
            <div class="stat-label">Total Referrals</div>
        </div>

        <div class="stat-card animated delay-1">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-value">{{ $referrals->where('status', 'active')->count() }}</div>
            <div class="stat-label">Active Users</div>
        </div>

        <div class="stat-card animated delay-2">
            <div class="stat-icon">
                <i class="fas fa-bangladeshi-taka-sign"></i>
            </div>
            <div class="stat-value">{{ auth()->user()->balance }} ৳</div>
            <div class="stat-label">Your Balance</div>
        </div>
    </div>

    @if(count($referrals) > 0)
        <div class="referrals-grid">
            @foreach($referrals as $referral)
                <div class="referral-card">
                    <span class="status-badge status-{{ $referral->status }}">
                        {{ ucfirst($referral->status) }}
                    </span>

                    <div class="user-avatar">
                        {{ substr($referral->first_name, 0, 1) }}{{ substr($referral->last_name, 0, 1) }}
                    </div>

                    <h3 class="user-name">{{ $referral->first_name }} {{ $referral->last_name }}</h3>
                    <div class="user-id">ID: {{ $referral->unique_id }}</div>

                    <div class="user-details">
                        <div class="detail-item">
                            <i class="fas fa-envelope"></i>
                            <span class="detail-value">{{ $referral->email }}</span>
                        </div>

                        <div class="detail-item">
                            <i class="fas fa-phone"></i>
                            <span class="detail-value">{{ $referral->whatsapp_number }}</span>
                        </div>

                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span class="detail-value">{{ $referral->created_at->format('d M, Y') }}</span>
                        </div>

                        <div class="detail-item">
                            <i class="fas fa-globe"></i>
                            <span class="detail-value">{{ $referral->country }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-users-slash"></i>
            </div>
            <h3 class="empty-text">You don't have any referrals yet</h3>
            <button class="btn-share" onclick="copyReferralLink()">
                <i class="fas fa-share-alt"></i> Share Your Referral Link
            </button>
        </div>
    @endif

   @section('js')
        <script>
            function copyReferralLink() {
                const referralCode = '{{ auth()->user()->unique_id }}';
                const referralLink = `${window.location.origin}/register?ref=${referralCode}`;

                navigator.clipboard.writeText(referralLink).then(() => {
                    // Show success message with SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Copied!',
                        text: 'Referral link copied to clipboard',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }).catch(err => {
                    console.error('Could not copy text: ', err);

                    // Show error message with SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to copy referral link',
                    });
                });
            }

            // Initialize animations
            document.addEventListener('DOMContentLoaded', function() {
                const animatedElements = document.querySelectorAll('.animated');

                animatedElements.forEach((element, index) => {
                    element.style.animationDelay = `${index * 0.1}s`;
                });
            });
        </script>
   @endsection
</div>
