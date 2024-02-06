<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('billing_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_gym')->references('id')->on('gyms');
            $table->text('identification');
            $table->text('type');
            $table->text('percentage');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('billing_fees');
    }
};
