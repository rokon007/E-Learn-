<?php

namespace App\Livewire\Frontend\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Profile extends Component
{
    public $receiver_id;
    public $amount;
    public $password;
    public $currentStep = 1;
    public $receiver;
    public $showModal = false;

    protected $rules = [
        'receiver_id' => 'required|exists:users,unique_id',
        'amount' => 'required|numeric|min:1',
        'password' => 'required|current_password',
    ];

    protected $messages = [
        'receiver_id.required' => 'Receiver Account ID is required.',
        'receiver_id.exists' => 'The receiver account does not exist.',
        'amount.required' => 'Amount is required.',
        'amount.numeric' => 'Amount must be a number.',
        'amount.min' => 'Amount must be at least 1.',
        'password.required' => 'Password is required.',
        'password.current_password' => 'The password is incorrect.',
    ];

    public function openBalanceTransferModal()
    {
        $this->showModal = true;
        $this->currentStep = 1;
        $this->reset(['receiver_id', 'amount', 'password', 'receiver']);
        $this->resetValidation();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->currentStep = 1;
        $this->reset(['receiver_id', 'amount', 'password', 'receiver']);
        $this->resetValidation();
    }

    public function nextStep()
    {
        $this->validate([
            'receiver_id' => 'required|exists:users,unique_id',
            'amount' => 'required|numeric|min:1',
        ]);

        // Check if receiver is not the current user
        if ($this->receiver_id === auth()->user()->unique_id) {
            $this->addError('receiver_id', 'You cannot transfer to your own account.');
            return;
        }

        // Check if user has sufficient balance
        if (auth()->user()->balance < $this->amount) {
            $this->addError('amount', 'Insufficient balance.');
            return;
        }

        $this->receiver = User::where('unique_id', $this->receiver_id)->first();
        $this->currentStep = 2;
    }

    public function previousStep()
    {
        $this->currentStep = 1;
        $this->resetValidation();
    }

    public function transferBalance()
    {
        $this->validate();

        // Perform the balance transfer
        DB::transaction(function () {
            $sender = auth()->user();
            $receiver = User::where('unique_id', $this->receiver_id)->first();
            $reference = 'BTF_' . time() . '_' . Str::upper(Str::random(6));

            // Deduct from sender
            $sender->balance -= $this->amount;
            $sender->save();

            // Add to receiver
            $receiver->balance += $this->amount;
            $receiver->save();

            // Create transaction record for sender
            Transaction::create([
                'user_id' => $sender->id,
                'type' => Transaction::TYPE_WITHDRAWAL,
                'amount' => $this->amount,
                'description' => 'Balance transfer to ' . $receiver->first_name . ' ' . $receiver->last_name . ' (' . $receiver->unique_id . ')',
                'reference' => $reference,
                'status' => Transaction::STATUS_COMPLETED,
            ]);

            // Create transaction record for receiver
            Transaction::create([
                'user_id' => $receiver->id,
                'type' => Transaction::TYPE_DEPOSIT,
                'amount' => $this->amount,
                'description' => 'Balance transfer from ' . $sender->first_name . ' ' . $sender->last_name . ' (' . $sender->unique_id . ')',
                'reference' => $reference,
                'status' => Transaction::STATUS_COMPLETED,
            ]);
        });

        // Reset form
        $this->reset(['receiver_id', 'amount', 'password', 'currentStep', 'receiver']);
        $this->showModal = false;

        // Show success message
        session()->flash('transfer_success', 'Balance transferred successfully!');

        // Dispatch event for SweetAlert
        $this->dispatch('balance-transferred');
    }

    public function render()
    {
        return view('livewire.frontend.user.profile')->layout('livewire.layout.user-app');
    }
}
