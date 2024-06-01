<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('whies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_1')->nullable();
            $table->string('title_2')->nullable();
            $table->bigInteger('nomor_box')->nullable();
            $table->longText('description_box_1')->nullable();
            $table->longText('description_box_2')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }


};
