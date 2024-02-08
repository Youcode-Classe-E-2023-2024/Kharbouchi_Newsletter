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
        Schema::create('forgot_password', function (Blueprint $table) {
            $table->id(); // It's good practice to have a primary key
            $table->string('email');
            $table->string('token');
            $table->timestamps(); // Corrected method to add created_at and updated_at

            $table->index('email'); // Proper way to add an index to the email column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forgot_password');
    }
};
