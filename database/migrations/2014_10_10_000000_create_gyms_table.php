<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gyms', function (Blueprint $table) {
            $table->id();
            $table->text('legal_name')->nullable(false);
            $table->text('fantasy_name')->nullable(false);
            $table->text('email')->nullable(false);
            $table->text('phone')->nullable(false);
            $table->string('cnpj', 14)->nullable(false);
            $table->text('logo_url')->nullable();
            $table->text('primary_color')->nullable();
            $table->text('secondary_color')->nullable();
            $table->string('zip_code', 8)->nullable(false);
            $table->text('street')->nullable(false);
            $table->text('district')->nullable(false);
            $table->text('number')->nullable(false);
            $table->text('city')->nullable(false);
            $table->text('state')->nullable(false);
            $table->text('complement')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gyms');
    }
};
