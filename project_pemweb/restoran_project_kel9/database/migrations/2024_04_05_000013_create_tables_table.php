<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesTable extends Migration
{
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->time('start')->nullable();
            $table->time('finish')->nullable();
            $table->enum('status', ['kosong', 'terbooking'])->default('kosong');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
