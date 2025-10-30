<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('studio_subscription_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id');
            $table->string('uuid', 60);
            $table->string('partner_reference_no', 60);
            $table->string('reference_no', 60);
            $table->unsignedBigInteger('studio_id');
            $table->string('total_amount', 255);
            $table->enum('payment_status', ['success', 'cancelled', 'pending'])->default('pending');
            $table->boolean('subscription_status')->default(false);
            $table->bigInteger('payment_expired_at');
            $table->bigInteger('subscription_expired_at')->nullable();
            $table->bigInteger('created_at');
            $table->bigInteger('updated_at');
            $table->text('payment_link');

            // Relasi ke tabel studios
            $table->foreign('studio_id')->references('id')->on('studios')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');

        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('studio_subscription_transactions');
    }
};
