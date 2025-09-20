<div>
    @section('title')
        <title>PassBook</title>
    @endsection

    @section('css')
        <style>
            .passbook-header {
                text-align: center;
                margin-bottom: 30px;
            }

            .passbook-title {
                font-size: 2.2rem;
                color: var(--text-dark);
                margin-bottom: 10px;
                position: relative;
                display: inline-block;
            }

            .passbook-title::after {
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

            .passbook-filters {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 25px;
                flex-wrap: wrap;
                gap: 15px;
            }

            .filter-group {
                display: flex;
                align-items: center;
                gap: 15px;
                flex-wrap: wrap;
            }

            .filter-btn {
                padding: 8px 16px;
                border-radius: 20px;
                background: #f1f5f9;
                color: #64748b;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s ease;
                border: none;
            }

            .filter-btn.active {
                background: linear-gradient(135deg, var(--accent-color), #3b82f6);
                color: white;
            }

            .filter-btn:hover:not(.active) {
                background: #e2e8f0;
            }

            .search-box {
                position: relative;
                min-width: 250px;
            }

            .search-input {
                width: 100%;
                padding: 10px 15px 10px 40px;
                border: 2px solid #e2e8f0;
                border-radius: 25px;
                font-size: 0.9rem;
                transition: all 0.3s ease;
            }

            .search-input:focus {
                border-color: var(--accent-color);
                box-shadow: 0 0 0 3px rgba(76, 132, 255, 0.2);
                outline: none;
            }

            .search-icon {
                position: absolute;
                left: 15px;
                top: 50%;
                transform: translateY(-50%);
                color: #64748b;
            }

            .transactions-list {
                background: white;
                border-radius: 15px;
                overflow: hidden;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            }

            .transaction-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px;
                border-bottom: 1px solid #f1f5f9;
                transition: background-color 0.3s ease;
            }

            .transaction-item:last-child {
                border-bottom: none;
            }

            .transaction-item:hover {
                background-color: #f8fafc;
            }

            .transaction-info {
                flex: 1;
            }

            .transaction-title {
                font-weight: 600;
                color: var(--text-dark);
                margin-bottom: 5px;
                display: flex;
                align-items: center;
            }

            .transaction-description {
                color: #64748b;
                font-size: 0.9rem;
                margin-bottom: 5px;
            }

            .transaction-meta {
                display: flex;
                align-items: center;
                gap: 15px;
                font-size: 0.8rem;
                color: #94a3b8;
            }

            .transaction-reference {
                font-family: monospace;
                background: #f1f5f9;
                padding: 3px 8px;
                border-radius: 4px;
            }

            .transaction-amount {
                font-weight: 700;
                font-size: 1.1rem;
                text-align: right;
            }

            .amount-positive {
                color: #10b981;
            }

            .amount-negative {
                color: #ef4444;
            }

            .transaction-type {
                display: inline-block;
                padding: 4px 10px;
                border-radius: 12px;
                font-size: 0.75rem;
                font-weight: 600;
                margin-left: 10px;
            }

            .type-deposit {
                background-color: rgba(16, 185, 129, 0.1);
                color: #10b981;
            }

            .type-withdrawal {
                background-color: rgba(239, 68, 68, 0.1);
                color: #ef4444;
            }

            .type-bonus {
                background-color: rgba(245, 158, 11, 0.1);
                color: #f59e0b;
            }

            .type-referral {
                background-color: rgba(139, 92, 246, 0.1);
                color: #8b5cf6;
            }

            .type-purchase {
                background-color: rgba(14, 165, 233, 0.1);
                color: #0ea5e9;
            }

            .empty-state {
                text-align: center;
                padding: 60px 20px;
            }

            .empty-icon {
                font-size: 4rem;
                color: #cbd5e1;
                margin-bottom: 20px;
            }

            .empty-text {
                color: #64748b;
                font-size: 1.1rem;
                margin-bottom: 10px;
            }

            .empty-subtext {
                color: #94a3b8;
                font-size: 0.9rem;
            }

            @media (max-width: 768px) {
                .transaction-item {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 15px;
                }

                .transaction-amount {
                    align-self: flex-end;
                }

                .passbook-filters {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .search-box {
                    width: 100%;
                }
            }
        </style>
    @endsection

    <div class="dashboard-header">
        <h1 class="dashboard-title">PassBook</h1>
    </div>

    <div class="passbook-header">
        <h2 class="passbook-title">Transaction History</h2>
        <p>View all your financial transactions in one place</p>
    </div>

    <div class="passbook-filters">
        <div class="filter-group">
            <button wire:click="$set('filter', 'all')" class="filter-btn {{ $filter === 'all' ? 'active' : '' }}">
                All Transactions
            </button>
            <button wire:click="$set('filter', 'deposit')" class="filter-btn {{ $filter === 'deposit' ? 'active' : '' }}">
                Deposits
            </button>
            <button wire:click="$set('filter', 'withdrawal')" class="filter-btn {{ $filter === 'withdrawal' ? 'active' : '' }}">
                Withdrawals
            </button>
            <button wire:click="$set('filter', 'bonus')" class="filter-btn {{ $filter === 'bonus' ? 'active' : '' }}">
                Bonuses
            </button>
            <button wire:click="$set('filter', 'referral')" class="filter-btn {{ $filter === 'referral' ? 'active' : '' }}">
                Referrals
            </button>
        </div>

        <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input
                type="text"
                wire:model.live="search"
                class="search-input"
                placeholder="Search transactions..."
            >
        </div>
    </div>

    <div class="transactions-list">
        @if($transactions && count($transactions) > 0)
            @foreach($transactions as $transaction)
                <div class="transaction-item">
                    <div class="transaction-info">
                        <div class="transaction-title">
                            {{ ucfirst($transaction->type) }}
                            <span class="transaction-type type-{{ $transaction->type }}">
                                {{ $transaction->type }}
                            </span>
                        </div>
                        <div class="transaction-description">
                            {{ $transaction->description }}
                        </div>
                        <div class="transaction-meta">
                            <span>{{ $transaction->created_at->format('M j, Y \\a\\t g:i A') }}</span>
                            <span class="transaction-reference">Ref: {{ $transaction->reference }}</span>
                        </div>
                    </div>
                    <div class="transaction-amount {{ in_array($transaction->type, ['deposit', 'bonus', 'referral']) ? 'amount-positive' : 'amount-negative' }}">
                        {{ in_array($transaction->type, ['deposit', 'bonus', 'referral']) ? '+' : '-' }}{{ $transaction->amount }} ৳
                    </div>
                </div>
            @endforeach
        @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-receipt"></i>
                </div>
                <h3 class="empty-text">No transactions found</h3>
                <p class="empty-subtext">
                    @if($filter !== 'all' || !empty($search))
                        Try changing your filters or search terms
                    @else
                        You don't have any transactions yet
                    @endif
                </p>
            </div>
        @endif
    </div>

   @section('js')
        <script>
            // Livewire hook to reload transactions when filters change
            document.addEventListener('livewire:load', function () {
                Livewire.on('filterUpdated', () => {
                    // Transactions will be automatically updated via Livewire
                });
            });
        </script>
   @endsection
</div>
