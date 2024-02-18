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
            $table->text('first_name')->nullable(false);
            $table->text('last_name')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password')->nullable(false);
            $table->text('phone')->nullable(false);
            $table->foreignId('id_gym')->references('id')->on('gyms');
            $table->enum('profile', ['desenvolvedor', 'proprietário', 'professor', 'aluno'])->nullable(false);
            $table->text('avatar_url')->nullable();
            $table->enum('gender', ['M', 'F'])->nullable(false);
            $table->string('cpf', 11)->unique()->nullable(false);
            $table->string('rg')->unique()->nullable();
            $table->text('birthday')->nullable(false);
            $table->text('height')->nullable();
            $table->text('weight')->nullable();
            $table->text('observation')->nullable();
            $table->string('zip_code', 8)->nullable();
            $table->text('street')->nullable();
            $table->text('district')->nullable();
            $table->text('number')->nullable();
            $table->text('city')->nullable();
            $table->text('state')->nullable();
            $table->text('complement')->nullable();
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
