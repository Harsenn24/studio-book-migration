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
        Schema::create('recons', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('studio_id');
            $table->string('total_amount')->comment('total amount dari booking transactions');
            $table->string('total_transactions');
            $table->bigInteger('period_start')->nullable();
            $table->bigInteger('period_end')->nullable();
            $table->enum('recon_status', ['pending', 'completed'])->default('pending');
            $table->bigInteger('created_at');
            $table->bigInteger('updated_at');

            $table->foreign('studio_id')->references('id')->on('studios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recons');
    }
};
