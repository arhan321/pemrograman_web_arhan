<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('dbtransaction')->dropIfExists('transactions');
        Schema::connection('dbtransaction')->create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('costumer_id');
            $table->integer('costumer_to');
            $table->string('nominal_transaksi');
            $table->string('saldo_awal');
            $table->string('saldo_akhir');
            $table->text('keterangan')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('dbtransaction')->dropIfExists('transactions');
    }
}
