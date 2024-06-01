<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Owner', 
            ],
            [
                'id'    => 2,
                'title' => 'manager_umum', 
            ],
            [
                'id'    => 3,
                'title' => 'kasir', 
            ],
            [
                'id'    => 4,
                'title' => 'waiter', 
            ],
            [
                'id'    => 5,
                'title' => 'kepala_chef', 
            ],
            [
                'id'    => 6,
                'title' => 'bartender', 
            ],
        ];

        Role::insert($roles);
    }
}
