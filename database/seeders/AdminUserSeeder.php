<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Rizka Fathia',
                'password' => Hash::make('admin1234'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
        $this->command->info('Admin user created or already exists.');
    }
}