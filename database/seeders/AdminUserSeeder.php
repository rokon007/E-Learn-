<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // যাতে বারবার run করলে duplicate না হয়
            [
                'first_name'      => 'Super',
                'last_name'       => 'Admin',
                'country'         => 'Bangladesh',
                'language'        => 'en',
                'whatsapp_number' => '01782100338',
                'reference_no'    => null,
                'balance'         => 0,
                'password'        => Hash::make('05082024'), // আপনার ইচ্ছেমত strong password দিন
                'status'          => 'active',
                'unique_id'       => Str::uuid(),
                'role'            => 'admin',
            ]
        );
    }
}
