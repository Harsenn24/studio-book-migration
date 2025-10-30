<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('profits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transactionable_id')->nullable()->comment('ID transaksi terkait, ke booking / subscription');
            $table->enum('type', ['booking', 'subscription'])->comment('Tipe transaksi');
            $table->decimal('gross_amount', 18, 6)->comment('Total nominal transaksi');
            $table->decimal('fee_system_amount', 18, 6)->comment('Total potongan sistem');
            $table->decimal('nett_amount', 18, 6)->comment('Keuntungan bersih setelah potongan');  
            $table->enum('payment_status', allowed: ['success', 'pending', 'failed'])->default(null)->nullable();          
            $table->unsignedBigInteger('created_at')->comment('Waktu dibuat dalam format epoch');
            $table->unsignedBigInteger('updated_at')->comment('Waktu diperbarui dalam format epoch');
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('profits');
    }
};
