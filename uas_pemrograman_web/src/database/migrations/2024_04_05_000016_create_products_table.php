<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('category')->nullable();
            $table->longText('description')->nullable();
            $table->string('tahun')->nullable();
            $table->string('warna')->nullable();
            $table->string('tipe')->nullable();
            $table->string('mesin')->nullable();
            $table->string('cc')->nullable();
            $table->string('pajak')->nullable();
            $table->string('transmition')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->integer('stock')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
