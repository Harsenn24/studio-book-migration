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
        Schema::create('user_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('action');
            $table->boolean('success')->default(false); // Whether the login attempt succeeded
            $table->text('ip_address')->nullable(); // Optional: store IP address
            $table->text('device_id'); // 
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');
            
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_logs');
    }
};
