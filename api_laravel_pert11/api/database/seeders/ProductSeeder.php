<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamp = Carbon::now()->toDateString();
        DB::table('products')->insert([
            'name' => 'book',
            'price' => 50000,
            'created_at' => $timestamp,
            'updated_at' => $timestamp,
        ]);
    }
}
