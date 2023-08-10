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
        Schema::create('pools', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('hardware_id')
                ->references('id')
                ->on('hardwares')
                ->cascadeOnDelete();
            $table->foreignUuid('pond_id')
                ->references('id')
                ->on('ponds')
                ->cascadeOnDelete();
            $table->string('name');
            $table->string('wide');
            $table->string('depth');
            $table->string('long');
            $table->string('noted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pools');
    }
};
