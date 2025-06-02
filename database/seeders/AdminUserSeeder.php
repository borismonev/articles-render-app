<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Check if admin already exists to avoid duplicates
        $existingAdmin = User::where('email', 'admin@taskiteasy.com')->first();

        if (!$existingAdmin) {
            User::create([
                'name' => 'Admin User',
                'email' => 'samv@devops.com',
                'password' => Hash::make('hboict2025'),
                'email_verified_at' => now(),
            ]);

            echo "Default admin created:\n";
            echo "Email: samv@devops.com\n";
            echo "Password: hboict2025\n";
        } else {
            echo "Admin user already exists.\n";
        }
    }
}
