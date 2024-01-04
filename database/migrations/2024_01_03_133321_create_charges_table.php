<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->references('id')->on('users');
            $table->foreignId('id_plan')->references('id')->on('plans');
            $table->date('billing_date')->nullable(false);
            $table->date('payment_date')->nullable();
            $table->enum('payment_method', ['dinheiro', 'pix', 'cartão crédito', 'cartão débito'])->nullable();
            $table->double('amount_paid')->nullable();
            $table->double('amount_received')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('charges');
    }
};
