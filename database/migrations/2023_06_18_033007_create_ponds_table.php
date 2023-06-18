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
        Schema::create('ponds', function (Blueprint $table) {
            $table->uuid('id')->primary()->index();
            $table->foreignUuid('user_id')
                ->constrained()
                ->cascadeOnDelete()
                ->references('id')
                ->on('users');
            $table->string('hardware_id')->unique()->index();
            $table->string('name');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ponds');
    }
};
