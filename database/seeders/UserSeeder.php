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
        $factoryUsers = [
            [
                'name' => 'admin user',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$83E/msQKfCozQwPZqGjHb.2NbB1N7vRUMGtqp9aMoCzSRLXso0HBi', // password
                'role' => 'admin',
                'avatar' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731075452/ezo3knci4lcyk7mslgxn.png'
            ],

            [
                'name' => 'author user',
                'email' => 'author@author.com',
                'password' => '$2y$10$83E/msQKfCozQwPZqGjHb.2NbB1N7vRUMGtqp9aMoCzSRLXso0HBi', // password
                'role' => 'author',
                'avatar' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731075452/ezo3knci4lcyk7mslgxn.png'
            ],
            [
                'name' => 'Hoang An',
                'email' => 'an@gmail.com',
                'password' => '$2y$10$I1AcOAGWbjR1WoNuBCCcZOVUwatWF29LN0jzpiLIJ2FAunp/9dxWu',
                'role' => 'user',
                'avatar' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731075452/ezo3knci4lcyk7mslgxn.png'
            ],
            [
                'name' => 'Ngoc Hung',
                'email' => 'hung@gmail.com',
                'password' => '$2y$10$SqRXQvNtzBsR5OpBy7OiueMNpnuLvE8.mK7yI0IOiLInjCxTCXtkC',
                'role' => 'author',
                'avatar' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731005605/ltvejr9nvpclcltdgfrb.png'
            ],
            [
                'name' => 'Ngoc Hung',
                'email' => 'truong@gmail.com',
                'password' => '$2y$10$VzfgUZ6uUa48MychgnKdje4ud/8GUFfyIgCahoVMgtrVtF6mVTslm',
                'role' => 'user',
                'avatar' => null
            ],
            [
                'name' => 'Duong Van Hoan',
                'email' => 'hoan@gmail.com',
                'password' => '$2y$10$akjVaYOghx2dyjwqhHpvHuJDRzH2PWK.wSizhXafRPdQrTLip4.iq',
                'role' => 'user',
                'avatar' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731077470/vpvqjtzgmcjd0p5blake.jpg'
            ],
            [
                'name' => 'google',
                'email' => 'google@gmail.com',
                'password' => '$2y$10$Cgay9zg4YBg9i/ib.uqasO4GrLiwDwmkyhdUAxOhqL.VsX4zQgn3W',
                'role' => 'author',
                'avatar' => null
            ],
            [
                'name' => 'apple',
                'email' => 'apple@gmail.com',
                'password' => '$2y$10$vQzEVURtcN.zNO9N2SEmBuxy3OQ8x8M9CrzlePBFjQ0A8xPhR68my',
                'role' => 'author',
                'avatar' => null
            ],
            [
                'name' => 'Nguen Manh',
                'email' => 'manh@gmail.com',
                'password' => '$2y$10$sog8OElPaF4imrmcyWJDdOJL2R08v36y1xB6UP3FhRyGOTbmIKTwq',
                'role' => 'author',
                'avatar' => null
            ],
            [
                'name' => 'DVanhoan',
                'email' => 'hoanv2208@gmail.com',
                'password' => '$2y$10$xh/8r46OZJaapy213OEoH./1vLaThoPxswU0f4XaYFEr9LJgcxd7S',
                'role' => 'author',
                'avatar' => null
            ],
            [
                'name' => 'Trinh Van Quyet',
                'email' => 'quyet@gmail.com',
                'password' => '$2y$10$hmkdZdWVzFIoPcR5o2/ISe5eUaSExpwOMCaUbNID5R3VDH.6gNx0K',
                'role' => 'user',
                'avatar' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731367806/xprmjngulpxdjxm0aboq.webp'
            ],
            [
                'name' => 'Nguyen Quang Hai',
                'email' => 'hai@gmail.com',
                'password' => '$2y$10$ZeWnHwsKRprM/B9P586o.uQ2o0wNlzOycoRYzTJjhDwEtpUil01uq',
                'role' => 'user',
                'avatar' => null
            ],
        ];

        // Thêm các user mới vào database
        foreach ($factoryUsers as $user) {
            $newUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'avatar' => $user['avatar']
            ]);
            $newUser->assignRole($user['role']);
        }
    }
}
