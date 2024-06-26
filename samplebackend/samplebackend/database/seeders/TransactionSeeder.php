<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TransactionSeeder extends Seeder
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
        DB::connection('dbtransaction')->table('transactions')->insert([
            'costumer_id'  => '1',
            'costumer_to'  => '2',
            'nominal_transaksi' => '5',
            'saldo_awal'  => '10',
            'saldo_akhir'  => '5',
            'keterangan' => 'transfer',
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]);
        DB::connection('dbtransaction')->table('transactions')->insert([
            'costumer_id'  => '2',
            'costumer_to'  => '1',
            'nominal_transaksi' => '3',
            'saldo_awal'  => '10',
            'saldo_akhir'  => '7',
            'keterangan' => 'transfer',
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]);
    }
}
