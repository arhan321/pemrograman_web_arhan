<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $timstamp = \Carbon\Carbon::now()->toDateString();
        // DB::table('orders')->insert([
        //     'customer_id' => '1',
        //     'status' => 'order pending',
        //     'created_at' => $timstamp,
        //     'updated_at' => $timstamp,
        // ]);
    }
}
