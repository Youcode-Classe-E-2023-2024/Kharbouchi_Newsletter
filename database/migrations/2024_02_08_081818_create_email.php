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
        Schema::create('emails', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Assuming a foreign key to a 'users' table
            $table->string('email_title');
            $table->string('email_content'); // Changed to 'text' type for longer content
            $table->text('description'); // Assuming this was meant to be a text field
            $table->timestamp('send_at')->nullable(); // Correctly defining a nullable timestamp for 'send_at'
            $table->timestamps(); // Automatically adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email');
    }
};
