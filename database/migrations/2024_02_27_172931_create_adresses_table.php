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
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->integer('id_owner');
            $table->string('zip_code', 8);
            $table->text('street');
            $table->text('district');
            $table->text('number');
            $table->text('city');
            $table->text('state');
            $table->text('complement')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresses');
    }
};
