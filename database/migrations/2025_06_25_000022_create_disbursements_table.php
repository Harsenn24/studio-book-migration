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
        Schema::create('disbursement_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recon_id');
            $table->unsignedBigInteger('studio_id');
            $table->string('amount');
            $table->string('reference_no', 60)->nullable();
            $table->string('partner_reference_no', 60);
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->bigInteger('disbursement_time')->nullable();
            $table->bigInteger('created_at');
            $table->bigInteger('updated_at');

            $table->foreign('recon_id')->references('id')->on('recons')->onDelete('cascade');
            $table->foreign('studio_id')->references('id')->on('studios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disbursements');
    }
};
