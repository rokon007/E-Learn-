<div>
    @section('title')
        <title>Admin | Inventory management</title>
    @endsection
    @section('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"
              integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ=="
              crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endsection
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Inventory</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Product Inventory Management</li>
              </ol>
            </nav>
          </div>
          <div class="ms-auto">
            <div class="btn-group">
              <a href="{{route('products.index')}}" class="btn btn-primary">Back</a>
            </div>
         </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h4 class="card-title">User Management</h4>
                            </div>
                            <div class="col-md-6 text-end">
                                <button class="btn btn-success me-2" wire:click="exportExcel">
                                    <i class="fas fa-file-excel"></i> Export Excel
                                </button>
                                <button class="btn btn-danger" wire:click="exportPdf">
                                    <i class="fas fa-file-pdf"></i> Export PDF
                                </button>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="Search..." wire:model="search">
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" wire:model="statusFilter">
                                    <option value="">All Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="active">Active</option>
                                    <option value="suspended">Suspended</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" wire:model="perPage">
                                    <option value="10">10 per page</option>
                                    <option value="25">25 per page</option>
                                    <option value="50">50 per page</option>
                                    <option value="100">100 per page</option>
                                </select>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" wire:model="selectAll">
                                            </div>
                                        </th>
                                        <th>Name</th>
                                        <th>WhatsApp Number</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Reference No</th>
                                        <th>Balance</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $user->id }}"
                                                    wire:model="selectedUsers">
                                            </div>
                                        </td>
                                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                        <td>{{ $user->whatsapp_number }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->country }}</td>
                                        <td>{{ $user->reference_no }}</td>
                                        <td>${{ number_format($user->balance, 2) }}</td>
                                        <td>
                                            <span class="badge bg-{{ $user->status == 'active' ? 'success' : ($user->status == 'pending' ? 'warning' : 'danger') }}">
                                                {{ ucfirst($user->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    @if($user->status != 'active')
                                                    <li><a class="dropdown-item" href="#" wire:click="updateStatus({{ $user->id }}, 'active')">Activate</a></li>
                                                    @endif
                                                    @if($user->status != 'suspended')
                                                    <li><a class="dropdown-item" href="#" wire:click="updateStatus({{ $user->id }}, 'suspended')">Suspend</a></li>
                                                    @endif
                                                    @if($user->status != 'pending')
                                                    <li><a class="dropdown-item" href="#" wire:click="updateStatus({{ $user->id }}, 'pending')">Set to Pending</a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No users found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries</div>
                            <div>{{ $users->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



    @section('JS')

    @endsection

    @push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            // Livewire ইভেন্ট লিসেনার
            Livewire.on('showToast', (message) => {
                // Toast notification show করার লজিক
                // Skydash theme এর toast notification ব্যবহার করুন
                console.log(message);
            });
        });
    </script>
    @endpush
</div>
