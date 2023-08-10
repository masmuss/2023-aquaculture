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
        Schema::create('monitorings', function (Blueprint $table) {
            $table->uuid('id')->primary()->index();
            $table->foreignId('pool_id')
                ->constrained()
                ->cascadeOnDelete()
                ->references('id')
                ->on('pools');
            $table->foreignUuid('hardware_id')
                ->references('id')
                ->on('hardwares')
                ->cascadeOnDelete();
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
        Schema::dropIfExists('monitorings');
    }
};
