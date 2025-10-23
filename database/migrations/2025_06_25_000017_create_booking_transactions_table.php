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
        Schema::create('booking_transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string("partner_reference_no")->unique();
            $table->string("original_reference_no")->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('studio_id');

            $table->string('total_amount');
            $table->enum('status', ['booked', 'cancelled', 'pending'])->default('pending');
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at')->nullable();
            $table->string('payment_link')->nullable(); // link pembayaran
            $table->unsignedBigInteger('expired_at')->nullable(); // epoch time expired

            $table->boolean('recon_status')->default(false);
            $table->unsignedBigInteger('recon_id')->nullable();
            $table->enum('payment_status', ['success', 'pending', 'failed'])->default(null)->nullable();
            $table->unsignedBigInteger('payment_time')->nullable()->default(null);
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('recon_id')->references('id')->on('recons');
            $table->foreign('studio_id')->references('id')->on('studios');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
