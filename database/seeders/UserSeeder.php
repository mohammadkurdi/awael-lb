<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;

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
       $user=User::create([
                'name' => 'admin',
                'email' => 'admin@awael-me.com',
                'password' => '$2a$12$.iqjYRkSOwyVqCVegShvqOSS1SMDj8wjnW6ZZ9HXuBCkJ1fpVBvSK', // password
                'remember_token' => Str::random(10)
        ]);
        $admin = Role::where('id',1)->first();
        $user->attachRole($admin);

    }
}
