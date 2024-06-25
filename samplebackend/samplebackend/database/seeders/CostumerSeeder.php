<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CostumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
        DB::connection('dbcore')->table('costumers')->insert([
            'name'  => 'costumer satu',
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]);
        DB::connection('dbcore')->table('costumers')->insert([
            'name'  => 'costumer dua',
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]);

    }
}
