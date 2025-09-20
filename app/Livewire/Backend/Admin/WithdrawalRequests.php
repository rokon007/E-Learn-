<?php

namespace App\Livewire\Backend\Admin;

use Livewire\Component;
use App\Models\WithdrawalRequest;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WithdrawalRequests extends Component
{
    public $requests;
    public $selectedRequest;
    public $showModal = false;
    public $action;
    public $adminNote;
    public $filter = 'all';

    // Statistics properties
    public $pendingCount;
    public $approvedCount;
    public $rejectedCount;
    public $totalCount;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->loadRequests();
        $this->loadStatistics();
    }

    public function loadRequests()
    {
        $query = WithdrawalRequest::with('user')
            ->orderBy('created_at', 'desc');

        if ($this->filter !== 'all') {
            $query->where('status', $this->filter);
        }

        $this->requests = $query->get();
    }

    public function loadStatistics()
    {
        $this->pendingCount = WithdrawalRequest::where('status', 'pending')->count();
        $this->approvedCount = WithdrawalRequest::where('status', 'approved')->count();
        $this->rejectedCount = WithdrawalRequest::where('status', 'rejected')->count();
        $this->totalCount = WithdrawalRequest::count();
    }

    public function updatedFilter()
    {
        $this->loadRequests();
    }

    public function showActionModal($requestId, $action)
    {
        $this->selectedRequest = WithdrawalRequest::with('user')->find($requestId);
        $this->action = $action;
        $this->adminNote = '';
        $this->showModal = true;
    }

    public function processRequest()
    {
        $this->validate([
            'adminNote' => $this->action === 'reject' ? 'required' : 'nullable',
        ]);

        DB::transaction(function () {
            $request = WithdrawalRequest::find($this->selectedRequest->id);
            $user = User::find($request->user_id);
            $reference = 'WDL_' . time() . '_' . Str::upper(Str::random(6));

            if ($this->action === 'approve') {
                // Check if user has sufficient balance
                if ($user->balance < $request->amount) {
                    throw new \Exception('Insufficient balance in user account');
                }

                // Deduct amount from user's balance
                $user->balance -= $request->amount;
                $user->save();

                // Update request status
                $request->update([
                    'status' => WithdrawalRequest::STATUS_APPROVED,
                    'admin_note' => $this->adminNote,
                    'transaction_id' => $reference,
                ]);

                // Create transaction record
                Transaction::create([
                    'user_id' => $user->id,
                    'type' => Transaction::TYPE_WITHDRAWAL,
                    'amount' => $request->amount,
                    'description' => 'Withdrawal approved via ' . $request->payment_method,
                    'reference' => $reference,
                    'status' => Transaction::STATUS_COMPLETED,
                ]);

            } elseif ($this->action === 'reject') {
                // Update request status only
                $request->update([
                    'status' => WithdrawalRequest::STATUS_REJECTED,
                    'admin_note' => $this->adminNote,
                ]);
            }
        });

        $this->showModal = false;
        $this->loadRequests();
        $this->loadStatistics();

        // Show success message
        $this->dispatch('show-toast',
            type: 'success',
            message: 'Withdrawal request ' . $this->action . 'ed successfully!'
        );
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['selectedRequest', 'action', 'adminNote']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.backend.admin.withdrawal-requests')
            ->layout('livewire.layout.backend.app');
    }
}
