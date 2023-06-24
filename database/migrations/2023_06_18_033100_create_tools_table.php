<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tools', function (Blueprint $table) {
            $table->uuid('id')->primary()->index();
            $table->foreignId('pool_id')
                ->constrained()
                ->cascadeOnDelete()
                ->references('id')
                ->on('pools');
            $table->string('hardware_id');
            $table->foreign('hardware_id')
                ->references('hardware_id')
                ->on('ponds')
                ->onDelete('cascade');
            $table->string('time');
            $table->string('temperature');
            $table->string('ph');
            $table->string('salinity');
            $table->string('do');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tools');
    }
};
