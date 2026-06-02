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
        User::firstOrCreate(
            ['email' => 'mailtokhanasrar@gmail.com'],
            [
                'name' => 'Khan Asrar',
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
