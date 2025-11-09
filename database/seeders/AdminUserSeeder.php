<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::updateOrCreate([
            'name' => 'admin',
        ], [
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        \App\Models\User::updateOrCreate([
            'name' => 'airezra',
        ], [
            'email' => 'airezra@example.com',
            'password' => bcrypt('mc544aar'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}
