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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('type')->default('student');
            $table->tinyInteger('trusted')->default(0);
            $table->tinyInteger('is_disabled')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};