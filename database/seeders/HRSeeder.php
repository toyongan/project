<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class HRSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'hr@hiring.com'],
            [
                'first_name'        => 'HR',
                'last_name'         => 'Manager',
                'password'          => Hash::make('hr123'),
                'role'              => 'hr_manager',
                'email_verified_at' => now(),
            ]
        );
    }
}
