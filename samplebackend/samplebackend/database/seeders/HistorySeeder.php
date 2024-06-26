<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;

class HistorySeeder extends Seeder
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
        DB::connection('dbhistory')->table('histories')->insert([
            'costumer_id'  => '1',
            'status' => 'sukses',
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]);
        DB::connection('dbhistory')->table('histories')->insert([
            'costumer_id'  => '2',
            'status' => 'sukses',
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]);
    }
}
