<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'phone' => 123456789,
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'johndoe@example.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
            'is_active' => true
        ]);
    }
}
