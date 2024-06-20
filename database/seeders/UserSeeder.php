<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'ADMIN',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456789'), // Change to a secure password
            'role' => 1, // Assuming 0 is the role for a standard user
        ]);
    }
}
