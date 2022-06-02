<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
        // Default credentials
        \App\Models\User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@awael-me.com',
                'email_verified_at' => now(),
                'password' => '$2a$12$.iqjYRkSOwyVqCVegShvqOSS1SMDj8wjnW6ZZ9HXuBCkJ1fpVBvSK', // password
                'gender' => 'male',
                'active' => 1,
                'remember_token' => Str::random(10)
            ]
        ]);

        // Fake users
    }
}
