<div>
    @section('title')
        Withdrawal Requests - Admin Panel
    @endsection

    @section('css')
        <style>
            .card {
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .table-responsive {
                border-radius: 10px;
                overflow: hidden;
            }

            .table th {
                background-color: #f8f9fa;
                border-top: none;
                font-weight: 600;
                color: #495057;
            }

            .status-badge {
                padding: 5px 10px;
                border-radius: 20px;
                font-size: 0.75rem;
                font-weight: 600;
            }

            .status-pending {
                background-color: rgba(255, 193, 7, 0.2);
                color: #ffc107;
            }

            .status-approved {
                background-color: rgba(40, 167, 69, 0.2);
                color: #28a745;
            }

            .status-rejected {
                background-color: rgba(220, 53, 69, 0.2);
                color: #dc3545;
            }

            .filter-btn {
                padding: 8px 16px;
                border-radius: 20px;
                background: #f8f9fa;
                color: #495057;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s ease;
                border: none;
                margin-right: 10px;
            }

            .filter-btn.active {
                background: #4e73df;
                color: white;
            }

            .user-avatar {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: linear-gradient(135deg, #4e73df, #224abe);
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-weight: 600;
                margin-right: 10px;
            }

            .action-btn {
                padding: 5px 12px;
                border-radius: 5px;
                font-size: 0.875rem;
                font-weight: 500;
                transition: all 0.3s ease;
            }

            .btn-approve {
                background-color: rgba(40, 167, 69, 0.1);
                color: #28a745;
                border: 1px solid #28a745;
            }

            .btn-approve:hover {
                background-color: #28a745;
                color: white;
            }

            .btn-reject {
                background-color: rgba(220, 53, 69, 0.1);
                color: #dc3545;
                border: 1px solid #dc3545;
            }

            .btn-reject:hover {
                background-color: #dc3545;
                color: white;
            }

            .btn-cancel {
            display: inline-block;
            padding: 8px 14px;
            font-size: 14px;
            border-radius: 8px;
            border: 1px solid #d0d7de;
            background-color: #ffffff;
            color: #333;
            cursor: pointer;
            transition: background-color 140ms ease, transform 120ms ease, box-shadow 120ms ease;
            min-width: 88px;
            text-align: center;
            }

            /* Hover / active / focus */
            .btn-cancel:hover {
            background-color: #f6f7f8;
            }
            .btn-cancel:active {
            transform: translateY(1px);
            }
            .btn-cancel:focus {
            box-shadow: 0 0 0 4px rgba(0,123,255,0.08);
            outline: none;
            }

            .modal-close-btn {
                position: absolute;
                top: 12px;
                right: 12px;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                border: none;
                background: transparent;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 18px;
                line-height: 1;
                cursor: pointer;
                transition: background-color 150ms ease, transform 120ms ease;
                color: #333;
                box-shadow: none;
                }

            /* Modal Styles */
            .modal-content {
                border-radius: 15px;
                border: none;
            }

            .modal-header {
                border-bottom: 1px solid #e3e6f0;
                padding: 1rem 1.5rem;
            }

            .modal-title {
                font-weight: 600;
                color: #5a5c69;
            }

            .modal-body {
                padding: 1.5rem;
            }

            .modal-footer {
                border-top: 1px solid #e3e6f0;
                padding: 1rem 1.5rem;
            }

            .request-details {
                background-color: #f8f9fc;
                border-radius: 10px;
                padding: 15px;
                margin-bottom: 20px;
            }

            .detail-item {
                display: flex;
                justify-content: space-between;
                margin-bottom: 10px;
            }

            .detail-label {
                font-weight: 600;
                color: #5a5c69;
            }

            .detail-value {
                color: #858796;
            }

            .form-label {
                font-weight: 600;
                color: #5a5c69;
                margin-bottom: 8px;
            }

            .form-control {
                border-radius: 8px;
                border: 1px solid #d1d3e2;
                padding: 10px 15px;
            }

            .form-control:focus {
                border-color: #4e73df;
                box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
            }

            .stats-card {
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 20px;
                text-align: center;
            }

            .stats-pending {
                background: linear-gradient(135deg, rgba(255, 193, 7, 0.1), rgba(255, 193, 7, 0.2));
                color: #ffc107;
            }

            .stats-approved {
                background: linear-gradient(135deg, rgba(40, 167, 69, 0.1), rgba(40, 167, 69, 0.2));
                color: #28a745;
            }

            .stats-rejected {
                background: linear-gradient(135deg, rgba(220, 53, 69, 0.1), rgba(220, 53, 69, 0.2));
                color: #dc3545;
            }

            .stats-count {
                font-size: 2rem;
                font-weight: 700;
                margin-bottom: 5px;
            }

            .stats-label {
                font-size: 0.9rem;
                font-weight: 600;
            }

            .fixed {
                position: fixed;
            }
            .inset-0 {
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
            }
            .z-50 {
                z-index: 50;
            }
            .bg-opacity-50 {
                --tw-bg-opacity: 0.5;
            }
            .max-w-md {
                max-width: 28rem;
            }
            /* Modal Styles */
            .modal-backdrop {
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1040;
                width: 100vw;
                height: 100vh;
                background-color: #000;
                opacity: 0.5;
            }

            .modal {
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1050;
                width: 100%;
                height: 100%;
                overflow-x: hidden;
                overflow-y: auto;
                outline: 0;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .modal-dialog {
                position: relative;
                width: auto;
                margin: 0.5rem;
                pointer-events: none;
                max-width: 500px;
            }

            .modal-content {
                position: relative;
                display: flex;
                flex-direction: column;
                width: 100%;
                pointer-events: auto;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid rgba(0, 0, 0, 0.2);
                border-radius: 0.3rem;
                outline: 0;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            }

            .modal-header {
                display: flex;
                align-items: flex-start;
                justify-content: space-between;
                padding: 1rem;
                border-bottom: 1px solid #e9ecef;
                border-top-left-radius: 0.3rem;
                border-top-right-radius: 0.3rem;
            }

            .modal-body {
                position: relative;
                flex: 1 1 auto;
                padding: 1rem;
            }

            .modal-footer {
                display: flex;
                align-items: center;
                justify-content: flex-end;
                padding: 1rem;
                border-top: 1px solid #e9ecef;
                border-bottom-right-radius: 0.3rem;
                border-bottom-left-radius: 0.3rem;
            }

            /* Transition effects */
            .modal-fade-enter {
                opacity: 0;
            }

            .modal-fade-enter-active {
                opacity: 1;
                transition: opacity 0.15s linear;
            }

            .modal-fade-exit {
                opacity: 1;
            }

            .modal-fade-exit-active {
                opacity: 0;
                transition: opacity 0.15s linear;
            }

        </style>
    @endsection

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Withdrawal Requests</h1>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stats-card stats-pending">
                    <div class="stats-count">{{ $pendingCount }}</div>
                    <div class="stats-label">Pending Requests</div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stats-card stats-approved">
                    <div class="stats-count">{{ $approvedCount }}</div>
                    <div class="stats-label">Approved Requests</div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stats-card stats-rejected">
                    <div class="stats-count">{{ $rejectedCount }}</div>
                    <div class="stats-label">Rejected Requests</div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stats-card" style="background: linear-gradient(135deg, rgba(78, 115, 223, 0.1), rgba(78, 115, 223, 0.2)); color: #4e73df;">
                    <div class="stats-count">{{ $totalCount }}</div>
                    <div class="stats-label">Total Requests</div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <span class="mr-2">Filter:</span>
                    <button wire:click="$set('filter', 'all')" class="filter-btn {{ $filter === 'all' ? 'active' : '' }}">
                        All Requests
                    </button>
                    <button wire:click="$set('filter', 'pending')" class="filter-btn {{ $filter === 'pending' ? 'active' : '' }}">
                        Pending
                    </button>
                    <button wire:click="$set('filter', 'approved')" class="filter-btn {{ $filter === 'approved' ? 'active' : '' }}">
                        Approved
                    </button>
                    <button wire:click="$set('filter', 'rejected')" class="filter-btn {{ $filter === 'rejected' ? 'active' : '' }}">
                        Rejected
                    </button>
                </div>
            </div>
        </div>

        <!-- Requests Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Payment Method</th>
                                <th>Mobile Number</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Request Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($requests as $request)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar">
                                                {{ substr($request->user->first_name, 0, 1) }}{{ substr($request->user->last_name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div>{{ $request->user->first_name }} {{ $request->user->last_name }}</div>
                                                <small class="text-muted">ID: {{ $request->user->unique_id }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ ucfirst($request->payment_method) }}</td>
                                    <td>{{ $request->mobile_number }}</td>
                                    <td>{{ $request->amount }} ৳</td>
                                    <td>
                                        <span class="status-badge status-{{ $request->status }}">
                                            {{ ucfirst($request->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $request->created_at->format('M j, Y g:i A') }}</td>
                                    <td>
                                        @if($request->status === 'pending')
                                            <button wire:click="showActionModal({{ $request->id }}, 'approve')" class="action-btn btn-approve mr-2">
                                                <i class="fas fa-check"></i> Approve
                                            </button>
                                            <button wire:click="showActionModal({{ $request->id }}, 'reject')" class="action-btn btn-reject">
                                                <i class="fas fa-times"></i> Reject
                                            </button>
                                        @else
                                            <span class="text-muted">Processed</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <i class="fas fa-receipt fa-3x text-gray-300 mb-3"></i>
                                        <h5 class="text-gray-500">No withdrawal requests found</h5>
                                        <p class="text-gray-400">When users make withdrawal requests, they will appear here.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Modal -->
    <div>
        <!-- Modal Backdrop -->
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300 ease-in-out"
            style="display: {{ $showModal ? 'block' : 'none' }};"
            wire:click="closeModal">
        </div>

        <!-- Modal -->
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 sty"
            style="display: {{ $showModal ? 'flex' : 'none' }};">

            <div style="background-color: #FCC6BB;" class="rounded-lg shadow-xl w-full max-w-md mx-auto" wire:click.stop>
                <div class="modal-header px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                    <h5 class="modal-title text-lg font-semibold text-gray-800">
                        {{ $action === 'approve' ? 'Approve' : 'Reject' }} Withdrawal Request
                    </h5>
                    <button type="button" class="modal-close-btn" wire:click="closeModal">
                        &times;
                    </button>
                </div>

                <div class="modal-body p-6">
                    @if($selectedRequest)
                    <div class="request-details bg-gray-50 rounded-lg p-4 mb-4">
                        <div class="detail-item flex justify-between mb-3">
                            <span class="detail-label font-medium text-gray-600">User:</span>
                            <span class="detail-value text-gray-800">{{ $selectedRequest->user->first_name }} {{ $selectedRequest->user->last_name }}</span>
                        </div>
                        <div class="detail-item flex justify-between mb-3">
                            <span class="detail-label font-medium text-gray-600">Payment Method:</span>
                            <span class="detail-value text-gray-800">{{ ucfirst($selectedRequest->payment_method) }}</span>
                        </div>
                        <div class="detail-item flex justify-between mb-3">
                            <span class="detail-label font-medium text-gray-600">Mobile Number:</span>
                            <span class="detail-value text-gray-800">{{ $selectedRequest->mobile_number }}</span>
                        </div>
                        <div class="detail-item flex justify-between">
                            <span class="detail-label font-medium text-gray-600">Amount:</span>
                            <span class="detail-value font-bold text-blue-600">{{ $selectedRequest->amount }} ৳</span>
                        </div>
                    </div>

                    @if($action === 'reject')
                    <div class="form-group mb-4">
                        <label class="form-label block font-medium text-gray-700 mb-2">Reason for Rejection *</label>
                        <textarea wire:model="adminNote" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" rows="3" placeholder="Please provide a reason for rejecting this withdrawal request"></textarea>
                        @error('adminNote') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    @else
                    <div class="form-group mb-4">
                        <label class="form-label block font-medium text-gray-700 mb-2">Admin Note (Optional)</label>
                        <textarea wire:model="adminNote" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" rows="3" placeholder="Add any notes about this approval"></textarea>
                    </div>
                    @endif
                    @endif
                </div>

                <div class="modal-footer px-6 py-4 border-t border-gray-200 bg-gray-50 rounded-b-lg flex justify-end space-x-3">
                    <button type="button" class="btn-cancel" wire:click="closeModal">
                        Cancel
                    </button>
                    <button type="button" class="action-btn {{ $action === 'approve' ? 'btn-approve' : 'btn-reject' }}" wire:click="processRequest">
                        {{ $action === 'approve' ? 'Approve' : 'Reject' }} Request
                    </button>
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script>
            // Listen for toast messages
            document.addEventListener('livewire:initialized', () => {
                Livewire.on('show-toast', (data) => {
                    // Using SweetAlert for toast notifications
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });

                    Toast.fire({
                        icon: data.type,
                        title: data.message
                    });
                });
            });

            // Close modal with Escape key
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    @this.closeModal();
                }
            });
        </script>
    @endsection


</div>
