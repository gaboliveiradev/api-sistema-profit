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
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_gym')->references('id')->on('gyms');
            $table->foreignId('id_user')->references('id')->on('users');
            $table->foreignId('id_plan')->references('id')->on('plans');
            $table->date('billing_date')->nullable(false);
            $table->date('payment_date')->nullable();
            $table->enum('payment_method', ['money', 'pix', 'credit_card', 'debit_card'])->nullable();
            $table->double('amount_paid')->nullable();
            $table->double('amount_received')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
