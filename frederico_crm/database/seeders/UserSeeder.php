<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Sales Person',
            'email' => 'sales@smart.com',
            'password' => Hash::make('password'),
            'role' => 'sales',
        ]);

        User::create([
            'name' => 'Manager Person',
            'email' => 'manager@smart.com',
            'password' => Hash::make('password'),
            'role' => 'manager',
        ]);
    }
}