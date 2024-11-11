<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* create admin, author and user */
        /* password for these users is password */

        $factoryUsers = [
            [
                'name' => 'admin user',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$83E/msQKfCozQwPZqGjHb.2NbB1N7vRUMGtqp9aMoCzSRLXso0HBi', // password
                'role' => 'admin',
                'avatar' => ''
            ],

            [
                'name' => 'author user',
                'email' => 'author@author.com',
                'password' => '$2y$10$83E/msQKfCozQwPZqGjHb.2NbB1N7vRUMGtqp9aMoCzSRLXso0HBi', // password
                'role' => 'author',
                'avatar' => ''
            ],

            [
                'name' => 'simple user',
                'email' => 'user@user.com',
                'password' => '$2y$10$83E/msQKfCozQwPZqGjHb.2NbB1N7vRUMGtqp9aMoCzSRLXso0HBi', // password
                'role' => 'user',
                'avatar' => ''
            ],
        ];

        foreach ($factoryUsers as $user) {
            $newUser =  User::factory()->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);
            $newUser->assignRole($user['role']);
        }
    }
}