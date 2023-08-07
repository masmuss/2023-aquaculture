<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvincesTables extends Migration
{
    public function up(): void
    {
        Schema::create('provinces', function(Blueprint $table){
            $table->char('id', 2)->index();
            $table->string('name');
        });
    }

    public function down(): void
    {
        Schema::drop('provinces');
    }
}
