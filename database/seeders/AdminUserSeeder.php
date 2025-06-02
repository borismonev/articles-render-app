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
        $existingAdmin = User::where('email', 'admin@articles.com')->first();

        if (!$existingAdmin) {
            User::create([
                'name' => 'Admin User',
                'email' => 'borismonev@devops.com',
                'password' => Hash::make('devops123'),
                'email_verified_at' => now(),
            ]);

            echo "Default admin created:\n";
            echo "Email: borismonev@devops.com\n";
            echo "Password: devops123\n";
        } else {
            echo "Admin user already exists.\n";
        }
    }
}
