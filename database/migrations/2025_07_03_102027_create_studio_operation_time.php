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
        Schema::create('studio_operation_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studio_price_id');
            $table->unsignedBigInteger('date_id');
            $table->unsignedTinyInteger('start_hour_id');
            $table->unsignedTinyInteger('end_hour_id');
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');

            $table->foreign('studio_price_id')->references('id')->on('studio_prices');
            $table->foreign('date_id')->references('id')->on('dates');
            $table->foreign('start_hour_id')->references('id')->on('hours');
            $table->foreign('end_hour_id')->references('id')->on('hours');

            $table->unique(
                ['studio_price_id', 'date_id', 'start_hour_id', 'end_hour_id'],
                'unique_studio_operation'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studio_operation_times');
    }
};
