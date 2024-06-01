<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->timestamps();
            $table->softDeletes();
        });
    }

};
