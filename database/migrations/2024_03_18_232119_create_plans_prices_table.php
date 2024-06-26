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
        Schema::create('plans_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_plan');
            $table->foreign('id_plan')->references('id')->on('plans');
            $table->integer('period');
            $table->double('price');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans_frequency');
    }
};
