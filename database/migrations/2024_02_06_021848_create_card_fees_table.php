<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('card_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_gym')->references('id')->on('gyms');
            $table->text('flag');
            $table->text('type');
            $table->text('percentage');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('card_fees');
    }
};
