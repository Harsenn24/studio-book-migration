<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->comment('UUID unik untuk setiap transaksi');
            $table->enum('type', ['booking', 'subscription', 'disbursement'])
                  ->comment('Tipe transaksi: booking, subscription, atau disbursement');
            $table->bigInteger('created_at')->comment('Waktu pembuatan dalam format epoch');
            $table->bigInteger('updated_at')->nullable()->comment('Waktu update dalam format epoch');
        });
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
