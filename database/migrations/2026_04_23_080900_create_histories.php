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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->string('outer_id')->nullable();
            $table->string('name')->nullable();
            $table->string('barcode')->nullable();
            $table->string('number')->nullable();
            $table->string('karat')->nullable();
            $table->string('weight')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('price')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
