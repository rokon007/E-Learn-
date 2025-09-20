<div>
    @section('title')
        <title>Withdrawal</title>
    @endsection

    @section('css')
        <style>
            .w-24 {
                width: 6rem;
            }
            .h-full {
                height: 100%;
            }
            img, video {
                max-width: 100%;
                height: auto;
            }
            img, svg, video, canvas, audio, iframe, embed, object {
                display: block;
                vertical-align: middle;
            }
            img {
                overflow-clip-margin: content-box;
                overflow: clip;
            }

            /* Enhanced Withdrawal Styles */
            .dashboard-header {
                margin-bottom: 30px;
                text-align: center;
            }

            .dashboard-title {
                font-size: 2.2rem;
                color: var(--text-dark);
                margin-bottom: 10px;
                position: relative;
                display: inline-block;
            }

            .dashboard-title::after {
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

            .balance-card {
                background: white;
                border-radius: 15px;
                padding: 25px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                overflow: hidden;
                position: relative;
                margin-bottom: 30px;
            }

            .balance-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
            }

            .balance-card-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
                padding-bottom: 15px;
                border-bottom: 1px solid #e2e8f0;
            }

            .balance-card-title {
                font-size: 1.2rem;
                color: var(--text-dark);
                font-weight: 600;
            }

            .balance-card-icon {
                width: 50px;
                height: 50px;
                border-radius: 12px;
                background: linear-gradient(135deg, var(--accent-color), #3b82f6);
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.5rem;
            }

            .balance-card-value {
                font-size: 2rem;
                font-weight: 700;
                color: var(--text-dark);
                margin: 15px 0;
                display: flex;
                align-items: center;
            }

            .balance-card-value i {
                margin-right: 10px;
                color: var(--success);
                font-size: 1.8rem;
            }

            .balance-card-text {
                color: #64748b;
                font-size: 0.95rem;
                line-height: 1.5;
                padding: 10px;
                background-color: #f8fafc;
                border-radius: 8px;
                border-left: 4px solid var(--warning);
            }

            /* Payment Methods Section */
            .payment-section {
                margin-bottom: 40px;
            }

            .section-title {
                font-size: 1.5rem;
                color: var(--text-dark);
                margin-bottom: 25px;
                text-align: center;
                position: relative;
                padding-bottom: 10px;
            }

            .section-title::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 100px;
                height: 3px;
                background: var(--accent-color);
                border-radius: 2px;
            }

            .payment-methods {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 20px;
                margin-bottom: 30px;
            }

            @media (min-width: 768px) {
                .payment-methods {
                    grid-template-columns: repeat(4, 1fr);
                }
            }

            @media (max-width: 767px) {
                .payment-methods {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            .payment-card {
                background: white;
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                transition: all 0.3s ease;
                cursor: pointer;
                text-align: center;
                position: relative;
                overflow: hidden;
                border: 2px solid transparent;
                height: 140px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .payment-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                border-color: var(--accent-color);
            }

            .payment-card.selected {
                border-color: var(--accent-color);
                background-color: rgba(76, 132, 255, 0.05);
            }

            .payment-card.selected::after {
                content: '✓';
                position: absolute;
                top: 10px;
                right: 10px;
                width: 24px;
                height: 24px;
                background: var(--success);
                color: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 14px;
                font-weight: bold;
            }

            .payment-image {
                height: 70px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 10px;
            }

            .payment-image img {
                max-height: 100%;
                max-width: 100%;
                object-fit: contain;
            }

            .payment-name {
                font-weight: 600;
                color: var(--text-dark);
                font-size: 0.9rem;
            }

            /* Continue Button */
            .continue-btn-container {
                text-align: center;
                margin-top: 30px;
            }

            .btn-continue {
                display: inline-flex;
                align-items: center;
                background: linear-gradient(135deg, var(--accent-color), #3b82f6);
                color: white;
                padding: 15px 35px;
                border-radius: 30px;
                text-decoration: none;
                font-weight: 600;
                font-size: 1.1rem;
                transition: all 0.3s ease;
                border: none;
                cursor: pointer;
                box-shadow: 0 5px 15px rgba(76, 132, 255, 0.3);
            }

            .btn-continue:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 20px rgba(76, 132, 255, 0.4);
            }

            .btn-continue:active {
                transform: translateY(0);
            }

            .btn-continue i {
                margin-left: 10px;
                transition: transform 0.3s ease;
            }

            .btn-continue:hover i {
                transform: translateX(5px);
            }

            /* Modal Styles */
            .modal {
                display: none;
                position: fixed;
                z-index: 10000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.5);
            }

            .modal-content {
                background-color: white;
                margin: 5% auto;
                padding: 0;
                border-radius: 15px;
                width: 100%;
                max-width: 500px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                animation: modalFadeIn 0.3s;
                position: relative;
            }

            @keyframes modalFadeIn {
                from { opacity: 0; transform: translateY(-50px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .modal-header {
                padding: 20px;
                border-bottom: 1px solid #e2e8f0;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .modal-title {
                font-size: 1.5rem;
                color: var(--text-dark);
                font-weight: 600;
            }

            .close-modal {
                color: #64748b;
                font-size: 1.5rem;
                cursor: pointer;
                transition: color 0.3s;
            }

            .close-modal:hover {
                color: var(--text-dark);
            }

            .modal-body {
                padding: 20px;
            }

            .modal-step {
                display: none;
            }

            .modal-step.active {
                display: block;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-label {
                display: block;
                margin-bottom: 8px;
                font-weight: 600;
                color: var(--text-dark);
            }

            .form-input {
                width: 100%;
                padding: 12px 16px;
                border: 2px solid #e2e8f0;
                border-radius: 10px;
                font-size: 1rem;
                transition: all 0.3s ease;
            }

            .form-input:focus {
                border-color: var(--accent-color);
                box-shadow: 0 0 0 3px rgba(76, 132, 255, 0.2);
                outline: none;
            }

            .form-input.error {
                border-color: #ef4444;
            }

            .error-message {
                color: #ef4444;
                font-size: 0.85rem;
                margin-top: 5px;
            }

            .modal-footer {
                padding: 20px;
                border-top: 1px solid #e2e8f0;
                display: flex;
                justify-content: flex-end;
                gap: 10px;
            }

            .btn-modal {
                padding: 10px 20px;
                border-radius: 30px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                border: none;
            }

            .btn-modal-primary {
                background: linear-gradient(135deg, var(--accent-color), #3b82f6);
                color: white;
            }

            .btn-modal-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(76, 132, 255, 0.3);
            }

            .btn-modal-secondary {
                background: #e2e8f0;
                color: #64748b;
            }

            .btn-modal-secondary:hover {
                background: #cbd5e1;
            }

            .selected-method-display {
                text-align: center;
                margin-bottom: 20px;
            }

            .method-logo-small {
                height: 50px;
                margin-bottom: 10px;
            }

            .method-name {
                font-weight: 600;
                color: var(--text-dark);
            }

            /* History Styles */
            .history-section {
                margin-top: 50px;
            }

            .history-title {
                font-size: 1.5rem;
                color: var(--text-dark);
                margin-bottom: 20px;
                text-align: center;
            }

            .history-list {
                background: white;
                border-radius: 15px;
                overflow: hidden;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            }

            .history-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px;
                border-bottom: 1px solid #f1f5f9;
            }

            .history-item:last-child {
                border-bottom: none;
            }

            .history-info {
                flex: 1;
            }

            .history-method {
                font-weight: 600;
                color: var(--text-dark);
                margin-bottom: 5px;
            }

            .history-details {
                color: #64748b;
                font-size: 0.9rem;
                margin-bottom: 5px;
            }

            .history-date {
                color: #94a3b8;
                font-size: 0.8rem;
            }

            .history-amount {
                font-weight: 700;
                font-size: 1.1rem;
            }

            .history-status {
                padding: 5px 10px;
                border-radius: 12px;
                font-size: 0.75rem;
                font-weight: 600;
                margin-left: 10px;
            }

            .status-pending {
                background-color: rgba(245, 158, 11, 0.1);
                color: #f59e0b;
            }

            .status-approved {
                background-color: rgba(16, 185, 129, 0.1);
                color: #10b981;
            }

            .status-rejected {
                background-color: rgba(239, 68, 68, 0.1);
                color: #ef4444;
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

            /* Animation */
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .animated {
                animation: fadeIn 0.6s ease forwards;
            }

            .delay-1 { animation-delay: 0.1s; }
            .delay-2 { animation-delay: 0.2s; }
            .delay-3 { animation-delay: 0.3s; }
            .delay-4 { animation-delay: 0.4s; }
            .delay-5 { animation-delay: 0.5s; }
        </style>
    @endsection

    <div class="dashboard-header">
        <h1 class="dashboard-title">Withdrawal</h1>
    </div>

    <div class="balance-card animated">
        <div class="balance-card-header">
            <h3 class="balance-card-title">Balance</h3>
            <div class="balance-card-icon">
                <i class="fas fa-wallet"></i>
            </div>
        </div>
        <div class="balance-card-value"><i class="fas fa-bangladeshi-taka-sign"></i> {{ auth()->user()->balance }} ৳</div>
        <p class="balance-card-text">Your withdrawal account is active. You can withdraw only after 7 days from your last withdrawal!</p>
    </div>

    <div class="payment-section">
        <h2 class="section-title">Select Payment Method</h2>

        <div class="payment-methods">
            @foreach(['bikash', 'google-pay', 'nagad', 'paytm', 'phonepe', 'roket', 'upay'] as $index => $method)
                <div class="payment-card animated delay-{{ $index % 4 + 1 }}" data-method="{{ $method }}" wire:click="selectMethod('{{ $method }}')">
                    <div class="payment-image">
                        <img src="{{ asset('assets/img/payment/' . $method . '.png') }}" alt="{{ ucfirst($method) }}">
                    </div>
                    <div class="payment-name">{{ ucfirst($method) }}</div>
                </div>
            @endforeach
        </div>

        <!-- Withdrawal Request History -->
        <div class="history-section">
            <h2 class="history-title">Withdrawal History</h2>
            <div class="history-list">
                @if($withdrawalRequests && count($withdrawalRequests) > 0)
                    @foreach($withdrawalRequests as $request)
                        <div class="history-item">
                            <div class="history-info">
                                <div class="history-method">
                                    {{ ucfirst($request->payment_method) }}
                                    <span class="history-status status-{{ $request->status }}">
                                        {{ ucfirst($request->status) }}
                                    </span>
                                </div>
                                <div class="history-details">
                                    Mobile: {{ $request->mobile_number }} | Amount: {{ $request->amount }} ৳
                                </div>
                                <div class="history-date">
                                    {{ $request->created_at->format('M j, Y \\a\\t g:i A') }}
                                </div>
                            </div>
                            <div class="history-amount">
                                -{{ $request->amount }} ৳
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <h3 class="empty-text">No withdrawal history</h3>
                        <p class="empty-subtext">You haven't made any withdrawal requests yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Withdrawal Modal -->
    <div id="withdrawalModal" class="modal" style="@if($showModal) display: block; @else display: none; @endif">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Withdrawal Request</h2>
                <span class="close-modal" wire:click="closeModal">&times;</span>
            </div>
            <div class="modal-body">
                <!-- Step 1: Method and Mobile Number -->
                <div class="modal-step {{ $currentStep == 1 ? 'active' : '' }}">
                    <div class="selected-method-display">
                        <img src="{{ asset('assets/img/payment/' . $selectedMethod . '.png') }}" alt="{{ ucfirst($selectedMethod) }}" class="method-logo-small">
                        <div class="method-name">{{ ucfirst($selectedMethod) }}</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Mobile Number</label>
                        <input type="text" wire:model="mobileNumber" class="form-input @error('mobileNumber') error @enderror" placeholder="Enter your {{ ucfirst($selectedMethod) }} mobile number">
                        @error('mobileNumber') <div class="error-message">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Amount</label>
                        <input type="number" wire:model="amount" class="form-input @error('amount') error @enderror" placeholder="Enter amount">
                        @error('amount') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                </div>

                <!-- Step 2: Password Confirmation -->
                <div class="modal-step {{ $currentStep == 2 ? 'active' : '' }}">
                    <div class="form-group">
                        <label class="form-label">Your Password</label>
                        <input type="password" wire:model="password" class="form-input @error('password') error @enderror" placeholder="Enter your password to confirm">
                        @error('password') <div class="error-message">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                @if($currentStep == 1)
                    <button type="button" class="btn-modal btn-modal-secondary" wire:click="closeModal">Cancel</button>
                    <button type="button" class="btn-modal btn-modal-primary" wire:click="nextStep">Next</button>
                @else
                    <button type="button" class="btn-modal btn-modal-secondary" wire:click="previousStep">Back</button>
                    <button type="button" class="btn-modal btn-modal-primary" wire:click="nextStep">Confirm Withdrawal</button>
                @endif
            </div>
        </div>
    </div>

   @section('js')
        <!-- Include SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            // Close modal when clicking outside
            window.addEventListener('click', function(event) {
                const modal = document.getElementById('withdrawalModal');
                if (event.target === modal) {
                    @this.closeModal();
                }
            });

            // Listen for success message
            Livewire.on('showSuccess', (message) => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: message,
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        </script>
   @endsection
</div>
