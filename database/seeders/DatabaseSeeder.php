<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(2)
        ->hasTasks(5)
        ->create();

        User::factory()->hasTasks(10)->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin123#'),
        ]);
    }
}
