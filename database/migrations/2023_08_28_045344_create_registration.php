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
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->string('Username');
            $table->string('Email')->unique();
            $table->integer('Number');
            $table->string('Address')->nullable(true);
            $table->string('Password');
            $table->string('Gender');
            $table->string('Profile_pic')->default('default.png');
            $table->string('Role')->default('User');
            $table->string('Status')->default('Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration');
    }
};
