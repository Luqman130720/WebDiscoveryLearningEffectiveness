<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Operator User
        User::create([
            'name' => 'Operator One',
            'username' => 'operator1', // Add username here
            'email' => 'operator1@example.com',
            'role' => 'operator',
            'password' => bcrypt('password'),
        ]);
    }
}
