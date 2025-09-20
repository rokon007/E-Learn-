<?php

namespace App\Livewire\Frontend\User;

use Livewire\Component;
use App\Models\WithdrawalRequest;
use Illuminate\Support\Facades\Hash;

class Withdrawal extends Component
{
    public $selectedMethod;
    public $mobileNumber;
    public $amount;
    public $password;
    public $currentStep = 1;
    public $showModal = false;
    public $withdrawalRequests;

    protected $rules = [
        'selectedMethod' => 'required',
        'mobileNumber' => 'required|string|max:15',
        'amount' => 'required|numeric|min:1',
        'password' => 'required|current_password',
    ];

    public function mount()
    {
        // Load user's withdrawal requests
        $this->withdrawalRequests = WithdrawalRequest::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function selectMethod($method)
    {
        $this->selectedMethod = $method;
        $this->currentStep = 1;
        $this->showModal = true;
        $this->reset(['mobileNumber', 'amount', 'password']);
        $this->resetValidation();
    }

    public function nextStep()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'selectedMethod' => 'required',
                'mobileNumber' => 'required|string|max:15',
                'amount' => 'required|numeric|min:1',
            ]);

            // Check if user has sufficient balance
            if (auth()->user()->balance < $this->amount) {
                $this->addError('amount', 'Insufficient balance.');
                return;
            }

            $this->currentStep = 2;
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'password' => 'required|current_password',
            ]);

            // Create withdrawal request
            WithdrawalRequest::create([
                'user_id' => auth()->id(),
                'payment_method' => $this->selectedMethod,
                'mobile_number' => $this->mobileNumber,
                'amount' => $this->amount,
                'status' => WithdrawalRequest::STATUS_PENDING,
            ]);

            // Deduct the amount from user's balance (optional - you might want to do this only after approval)
            // $user = auth()->user();
            // $user->balance -= $this->amount;
            // $user->save();

            $this->showModal = false;
            $this->currentStep = 1;
            $this->reset(['selectedMethod', 'mobileNumber', 'amount', 'password']);

            // Refresh the withdrawal requests list
            $this->mount();

            session()->flash('success', 'Withdrawal request submitted successfully!');
        }
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->currentStep = 1;
        $this->reset(['selectedMethod', 'mobileNumber', 'amount', 'password']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.frontend.user.withdrawal')->layout('livewire.layout.user-app');
    }
}
