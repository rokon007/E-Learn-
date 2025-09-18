<?php

namespace App\Livewire\Backend\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = '';
    public $perPage = 10;
    public $selectedUsers = [];
    public $selectAll = false;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('first_name', 'like', '%' . $this->search . '%')
                      ->orWhere('last_name', 'like', '%' . $this->search . '%')
                      ->orWhere('whatsapp_number', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('country', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->statusFilter, function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.backend.admin.user-management', [
            'users' => $users
        ]);
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedUsers = User::pluck('id')->toArray();
        } else {
            $this->selectedUsers = [];
        }
    }

    public function exportExcel()
    {
        $users = User::when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('first_name', 'like', '%' . $this->search . '%')
                      ->orWhere('last_name', 'like', '%' . $this->search . '%')
                      ->orWhere('whatsapp_number', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('country', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->statusFilter, function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->when(count($this->selectedUsers) > 0, function ($query) {
                $query->whereIn('id', $this->selectedUsers);
            })
            ->get();

        return Excel::download(new UsersExport($users), 'users-' . date('Y-m-d') . '.xlsx');
    }

    public function exportPdf()
    {
        $users = User::when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('first_name', 'like', '%' . $this->search . '%')
                      ->orWhere('last_name', 'like', '%' . $this->search . '%')
                      ->orWhere('whatsapp_number', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('country', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->statusFilter, function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->when(count($this->selectedUsers) > 0, function ($query) {
                $query->whereIn('id', $this->selectedUsers);
            })
            ->get();

        $pdf = \PDF::loadView('backend.admin.exports.users-pdf', compact('users'));
        return $pdf->download('users-' . date('Y-m-d') . '.pdf');
    }

    public function updateStatus($userId, $status)
    {
        $user = User::findOrFail($userId);
        $user->status = $status;
        $user->save();

        session()->flash('message', 'User status updated successfully.');
    }
}
