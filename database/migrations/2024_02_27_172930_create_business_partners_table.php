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
        Schema::create('business_partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_owner');
            $table->foreign('id_owner')->references('id')->on('users');
            $table->integer('type');
            $table->text('document');
            $table->text('legal_name');
            $table->text('fantasy_name')->nullable();
            $table->integer('segment');
            $table->text('email_contact')->nullable();
            $table->text('email_financial');
            $table->string('phone', 11)->nullable();
            $table->string('other_phone', 11)->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_partners');
    }
};
