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
        Schema::create('book_tickets', function (Blueprint $table) {
            $table->id('Ticket_id');
            $table->int('User_id'); // Assuming User_id is a foreign key
            $table->int('Quantity');
            $table->int('Movie_id'); // Assuming Movie_id is a foreign key
            $table->string('Movie_image');
            $table->string('Book_date');
            $table->string('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_tickets');
    }
};
