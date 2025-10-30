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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_transaction_id');
            $table->unsignedBigInteger('studio_operation_time_id');
            $table->enum('status', ['booked', 'cancelled', 'pending'])->default('pending');
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');

            $table->foreign('studio_operation_time_id')->references('id')->on('studio_operation_times');
            $table->foreign('booking_transaction_id')->references('id')->on('booking_transactions');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
