<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('datachefs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('position');
            $table->timestamps();
            $table->softDeletes();
        });
    }

};
