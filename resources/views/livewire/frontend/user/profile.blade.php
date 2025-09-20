<div>
    @section('title')
        <title>Profile</title>
    @endsection

    @section('css')
        <style>
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

            .transfer-details {
                background-color: #f8fafc;
                border-radius: 10px;
                padding: 15px;
                margin-bottom: 20px;
            }

            .detail-row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 10px;
            }

            .detail-label {
                color: #64748b;
                font-weight: 500;
            }

            .detail-value {
                color: var(--text-dark);
                font-weight: 600;
            }

            .receiver-info {
                display: flex;
                align-items: center;
                margin-bottom: 20px;
                padding: 15px;
                background-color: #f1f5f9;
                border-radius: 10px;
            }

            .receiver-avatar {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                background: linear-gradient(135deg, var(--accent-color), #3b82f6);
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.2rem;
                font-weight: 600;
                margin-right: 15px;
            }

            .receiver-name {
                font-weight: 600;
                color: var(--text-dark);
            }

            .receiver-id {
                color: #64748b;
                font-size: 0.9rem;
            }
        </style>
    @endsection
        {{-- Profile  --}}
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
                <span class="info-value">৳ {{auth()->user()->balance}}</span>
            </div>

            <a href="#" class="btn btn-outline btn-sm" wire:click="openBalanceTransferModal">
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
                <a href="#" class="btn btn-outline btn-sm" onclick="copyReferralCode()">
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

    <!-- Balance Transfer Modal -->
    <div id="balanceTransferModal" class="modal" style="@if($showModal) display: block; @else display: none; @endif">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Balance Transfer</h2>
                <span class="close-modal" wire:click="closeModal">&times;</span>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="transferBalance">
                    <!-- Step 1: Receiver and Amount -->
                    <div class="modal-step {{ $currentStep == 1 ? 'active' : '' }}" id="step1">
                        <div class="form-group">
                            <label class="form-label">Receiver Account ID</label>
                            <input type="text" wire:model="receiver_id" class="form-input @error('receiver_id') error @enderror" placeholder="Enter receiver's unique ID">
                            @error('receiver_id') <div class="error-message">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Amount to Transfer</label>
                            <input type="number" wire:model="amount" class="form-input @error('amount') error @enderror" placeholder="Enter amount">
                            @error('amount') <div class="error-message">{{ $message }}</div> @enderror
                        </div>

                        <div class="transfer-details">
                            <div class="detail-row">
                                <span class="detail-label">Your Balance:</span>
                                <span class="detail-value">{{ auth()->user()->balance }} ৳</span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">Transfer Fee:</span>
                                <span class="detail-value">0 ৳</span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">Total Deducted:</span>
                                <span class="detail-value">{{ $amount ? $amount : 0 }} ৳</span>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Confirmation -->
                    <div class="modal-step {{ $currentStep == 2 ? 'active' : '' }}" id="step2">
                        @if($receiver)
                        <div class="receiver-info">
                            <div class="receiver-avatar">
                                {{ substr($receiver->first_name, 0, 1) }}{{ substr($receiver->last_name, 0, 1) }}
                            </div>
                            <div>
                                <div class="receiver-name">{{ $receiver->first_name }} {{ $receiver->last_name }}</div>
                                <div class="receiver-id">ID: {{ $receiver->unique_id }}</div>
                            </div>
                        </div>
                        @endif

                        <div class="transfer-details">
                            <div class="detail-row">
                                <span class="detail-label">Receiver:</span>
                                <span class="detail-value">{{ $receiver_id }}</span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">Amount:</span>
                                <span class="detail-value">{{ $amount }} ৳</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Your Password</label>
                            <input type="password" wire:model="password" class="form-input @error('password') error @enderror" placeholder="Enter your password to confirm">
                            @error('password') <div class="error-message">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                @if($currentStep == 1)
                    <button type="button" class="btn-modal btn-modal-secondary" wire:click="closeModal">Cancel</button>
                    <button type="button" class="btn-modal btn-modal-primary" wire:click="nextStep">Next</button>
                @else
                    <button type="button" class="btn-modal btn-modal-secondary" wire:click="previousStep">Back</button>
                    <button type="button" class="btn-modal btn-modal-primary" wire:click="transferBalance">Confirm Transfer</button>
                @endif
            </div>
        </div>
    </div>

   @section('js')
        <!-- Include SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            // Copy referral code function
            function copyReferralCode() {
                const referralCode = '{{ auth()->user()->unique_id }}';

                navigator.clipboard.writeText(referralCode).then(() => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Copied!',
                        text: 'Referral code copied to clipboard',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }).catch(err => {
                    console.error('Could not copy text: ', err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to copy referral code',
                    });
                });
            }

            // Close modal when clicking outside
            window.addEventListener('click', function(event) {
                const modal = document.getElementById('balanceTransferModal');
                if (event.target === modal) {
                    @this.closeModal();
                }
            });

            // Listen for balance transferred event
            Livewire.on('balance-transferred', () => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Balance transferred successfully',
                    timer: 3000,
                    showConfirmButton: false
                });
            });

            // Listen for errors
            Livewire.on('transfer-error', (message) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: message,
                });
            });
        </script>
    @endsection
</div>
