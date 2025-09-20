<?php

namespace App\Livewire\Frontend\User;

use Livewire\Component;
use App\Models\Transaction;

class PassBook extends Component
{
    public $transactions;
    public $filter = 'all';
    public $search = '';

    public function mount()
    {
        $this->loadTransactions();
    }

    public function loadTransactions()
    {
        $query = Transaction::where('user_id', auth()->id())
            ->with('user')
            ->orderBy('created_at', 'desc');

        // Apply filters
        if ($this->filter !== 'all') {
            $query->where('type', $this->filter);
        }

        // Apply search
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('description', 'like', '%' . $this->search . '%')
                  ->orWhere('reference', 'like', '%' . $this->search . '%');
            });
        }

        $this->transactions = $query->get();
    }

    public function updatedFilter()
    {
        $this->loadTransactions();
    }

    public function updatedSearch()
    {
        $this->loadTransactions();
    }

    public function render()
    {
        return view('livewire.frontend.user.pass-book')->layout('livewire.layout.user-app');
    }
}
