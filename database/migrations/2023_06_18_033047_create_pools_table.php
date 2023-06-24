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
            $table->foreignUuid('user_id')
                ->constrained()
                ->cascadeOnDelete()
                ->references('id')
                ->on('users');
            $table->string('hardware_id');
            $table->foreign('hardware_id')
                ->references('hardware_id')
                ->on('ponds')
                ->onDelete('cascade');
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
