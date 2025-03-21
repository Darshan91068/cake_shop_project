<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID
            $table->string('username');  // Username field
            $table->string('email')->unique();  // Email field, unique constraint
            $table->string('profile_image')->nullable();  // Profile image, nullable
            $table->enum('gender', ['male', 'female', 'other'])->nullable();  // Gender field, nullable
            $table->string('password');  // Password field
            $table->timestamps();  // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
