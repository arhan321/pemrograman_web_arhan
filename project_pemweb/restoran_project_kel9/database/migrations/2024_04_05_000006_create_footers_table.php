<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFootersTable extends Migration
{
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo_restoran')->nullable();
            $table->string('detail')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('phone')->nullable();
            $table->string('faximile')->nullable();
            $table->string('email')->nullable();
            $table->string('opening_day')->nullable();
            $table->time('opening_hours')->nullable();
            $table->time('closing_hours')->nullable();
            $table->string('copyright')->nullable();
            $table->string('desain_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
