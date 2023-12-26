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
        Schema::create('operation_resource', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operation_id')->constrained();
            $table->foreignId('resource_id')->constrained();
            $table->unsignedInteger('used_qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operation_resource');
    }
};
