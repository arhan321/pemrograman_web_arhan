<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timstamp = \Carbon\Carbon::now()->toDateString();
        DB::table('customers')->insert([
            'full_name' => 'jhonnnn_doeee',
            'username' => 'john',
            'email' => 'john@gmail.com',
            'phone_number' => '082112233',
            'created_at' => $timstamp,
            'updated_at' => $timstamp,
        ]);
    }
}
