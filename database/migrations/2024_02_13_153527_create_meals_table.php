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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('date');
            $table->time('time');
            $table->unsignedInteger('calories');
            $table->unsignedInteger('carbohydrates')->nullable();
            $table->unsignedInteger('proteins')->nullable();
            $table->unsignedInteger('fats')->nullable();
            $table->unsignedInteger('fiber')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
