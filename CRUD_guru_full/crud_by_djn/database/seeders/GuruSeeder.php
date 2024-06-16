<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id'         => 1,
                'first_name'  => 'Arhan',
                'middle_name' => 'malik',
                'last_name'   => 'malik',
                'birth_dath'  => '2000-01-01',
                'foto'        => '0d2R0vHNaeJL6uSMxUBBBwQHXKSow7gomtAIbN42.jpg',
            ],
            [
                'id'         => 2,
                'first_name'  => 'djons',
                'middle_name' => 'sjons',
                'last_name'   => 'djons',
                'birth_dath'  => '1989-01-01',
                'foto'        => 'SPupybZ0ZRhzSu8BvaUQetOt3ywNtoJVG5ZtJgES.jpg',
            ],
        ];

        DB::table('gurus')->insert($data);
    }
}

