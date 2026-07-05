<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@jagobelajar.test'],
            [
                'name' => 'Admin Jago Belajar',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );
    }
}
