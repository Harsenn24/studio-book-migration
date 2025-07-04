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
            $table->unsignedBigInteger('studio_id');
            $table->unsignedTinyInteger('start_hour_id');
            $table->unsignedTinyInteger('end_hour_id');
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');

            $table->foreign('studio_id')->references('id')->on('studios');
            $table->foreign('start_hour_id')->references('id')->on('hours');
            $table->foreign('end_hour_id')->references('id')->on('hours');

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
