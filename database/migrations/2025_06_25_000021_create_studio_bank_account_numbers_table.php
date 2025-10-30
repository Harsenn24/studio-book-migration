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
        Schema::create('studio_bank_account_numbers', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke tabel studio_submissions
            $table->unsignedBigInteger('studio_submission_id');
            $table->foreign('studio_submission_id')
                  ->references('id')
                  ->on('studio_submissions')
                  ->onDelete('cascade');
            
            // Relasi opsional ke tabel studios
            $table->unsignedBigInteger('studio_id')->nullable();
            $table->foreign('studio_id')
                  ->references('id')
                  ->on('studios')
                  ->onDelete('set null');
            
            $table->string('bank_code');
            $table->string('bank_account_number');

            // Timestamp dalam format epoch
            $table->bigInteger('created_at');
            $table->bigInteger('updated_at');
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('studio_bank_account_numbers');
    }
};
