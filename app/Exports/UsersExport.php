<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    protected $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function collection()
    {
        return $this->users;
    }

    public function headings(): array
    {
        return [
            'Name',
            'WhatsApp Number',
            'Email',
            'Country',
        ];
    }

    public function map($user): array
    {
        return [
            $user->first_name . ' ' . $user->last_name,
            $user->whatsapp_number,
            $user->email,
            $user->country,
        ];
    }
}
