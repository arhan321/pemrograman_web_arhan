<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 2,
                'name'           => 'arhan malik alrasyid',
                'email'          => 'arhanmali96@gmail.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 3,
                'name'           => 'febru',
                'email'          => 'febru@gmail.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 4,
                'name'           => 'enep',
                'email'          => 'enep@gmail.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 5,
                'name'           => 'fathan',
                'email'          => 'fathanghani27@gmail.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 6,
                'name'           => 'adella',
                'email'          => 'adella@gmail.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 7,
                'name'           => 'fiolin',
                'email'          => 'fiolin@gmail.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'id'             => 8,
                'name'           => 'wahyukrupuk',
                'email'          => 'wahyukrupuk@gmail.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ];

        User::insert($users);
    }
}
