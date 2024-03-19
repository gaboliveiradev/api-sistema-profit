<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('first_name');
            $table->text('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->text('phone')->nullable();
            $table->integer('type');
            $table->text('avatar_url')->nullable();
            $table->enum('gender', ['M', 'F']);
            $table->string('cpf', 11)->unique()->nullable(false);
            $table->string('rg')->unique()->nullable();
            $table->text('birthday');
            $table->text('height')->nullable();
            $table->text('weight')->nullable();
            $table->text('observation')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
