<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, revoke admin access from ALL current users
        User::where('is_admin', true)->update(['is_admin' => false]);

        User::firstOrCreate(
            ['email' => 'admin@green.in'],
            [
                'name' => 'admin',
                'password' => Hash::make('password123'), // Change this if you want a default password
                'is_admin' => true,
                'city' => 'Srinagar',
                'profession' => 'Admin'
            ]
        );
        
        // Output message
        $this->command->info('Admin user seeded successfully!');
    }
}
