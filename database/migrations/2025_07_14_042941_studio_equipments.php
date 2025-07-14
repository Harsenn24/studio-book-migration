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
        Schema::create('studio_equipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studio_id');
            $table->unsignedBigInteger('studio_number_id');
            $table->unsignedBigInteger('equipment_id');
            $table->string('quntity')->nullable();
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');

            $table->foreign('studio_id')->references('id')->on('studios');
            $table->foreign('equipment_id')->references('id')->on('equipments');
            $table->foreign('studio_number_id')->references('id')->on('studio_numbers');

            $table->unique(
                ['studio_id', 'studio_number_id', 'equipment_id'],
                'unique_studio_equipment'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('studio_equipments');
    }
};
