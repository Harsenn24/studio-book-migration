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
        // 
        Schema::create('studio_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studio_id');
            $table->unsignedBigInteger('studio_number_id');
            $table->enum('day_type', ['weekday', 'weekend']);
            $table->string('price');
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');

            $table->foreign('studio_id')->references('id')->on('studios');
            $table->foreign('studio_number_id')->references('id')->on('studio_numbers');

            $table->unique(
                ['studio_id', 'studio_number_id', 'day_type'],
                'unique_studio_price'
            );

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('studio_prices');
    }
};
