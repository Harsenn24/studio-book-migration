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

        Schema::create('studios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('qr_image')->nullable();
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');
        });


        Schema::create('studio_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studio_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('village_id');
            $table->unsignedBigInteger('postal_code_id');
            $table->string('addresses');
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');

            $table->foreign('studio_id')->references('id')->on('studios');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('postal_code_id')->references('id')->on('postal_codes');
        });

        Schema::create('studio_operation_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studio_id');
            $table->string('type');
            $table->string('open_time');
            $table->string('close_time');
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');

            $table->foreign('studio_id')->references('id')->on('studios');
        });

        Schema::create('studio_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studio_id');
            $table->string('type');
            $table->string('price');
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');

            $table->foreign('studio_id')->references('id')->on('studios');
        });

        Schema::create('studio_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studio_id');
            $table->string('type');
            $table->string('path');
            $table->string('mime');
            $table->text('meta')->nullable();
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');

            $table->foreign('studio_id')->references('id')->on('studios');
        });

        Schema::create('studio_contact_persons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studio_id');
            $table->string('name');
            $table->string('phone');
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');

            $table->foreign('studio_id')->references('id')->on('studios');
        });

        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');
        });

        Schema::create('studio_equipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studio_id');
            $table->unsignedBigInteger('equipment_id');
            $table->string('quntity')->nullable();
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');
            $table->foreign('studio_id')->references('id')->on('studios');
            $table->foreign('equipment_id')->references('id')->on('equipments');


        });




        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studios_and_related_tables');
    }
};
