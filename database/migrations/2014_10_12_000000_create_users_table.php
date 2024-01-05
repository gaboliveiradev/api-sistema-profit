<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable(false);
            $table->string('phone', 11)->nullable(false);
            $table->foreignId('id_gym')->references('id')->on('gyms');
            $table->enum('profile', ['desenvolvedor', 'proprietário', 'professor', 'aluno'])->nullable(false);
            $table->text('avatar_url')->nullable();
            $table->enum('gender', ['M', 'F'])->nullable(false);
            $table->string('cpf', 11)->unique()->nullable(false);
            $table->string('rg')->unique()->nullable();
            $table->string('birthday')->nullable(false);
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->text('observation')->nullable();
            $table->string('zip_code', 8)->nullable(false);
            $table->string('street')->nullable(false);
            $table->string('district')->nullable(false);
            $table->string('number')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('state')->nullable(false);
            $table->string('complement')->nullable();
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
