<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

// Добавьте этот импорт

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.org',
            'password' => bcrypt('password'),
            'balance' => 0,
        ]);
        User::factory()->count(10)->create();
    }
}
