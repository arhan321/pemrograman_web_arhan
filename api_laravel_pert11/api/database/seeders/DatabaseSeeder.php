<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\models\Product;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserSeeder::class,]);
        $this->call([CustomerSeeder::class,]);
        $this->call([ProductSeeder::class]);
        $this->call([OrderSeeder::class]);
        $this->call([OrderitemSeeder::class]);
    }
}
