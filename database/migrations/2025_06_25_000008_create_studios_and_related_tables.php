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
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->unsignedBigInteger('studio_submission_id');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');
            $table->enum('status', ['active', 'inactive', 'freezed'])->default('inactive');

            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('studio_submission_id')->references('id')->on('studio_submissions');


        });


        Schema::create('studio_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studio_submission_id');
            $table->unsignedBigInteger('studio_id')->nullable();
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('village_id');
            $table->unsignedBigInteger('postal_code_id');
            $table->string('addresses');
            $table->longText('gmaps')->nullable();
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');

            $table->foreign('studio_submission_id')->references('id')->on('studio_submissions');
            $table->foreign('studio_id')->references('id')->on('studios');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('postal_code_id')->references('id')->on('postal_codes');
        });

        Schema::create('studio_contact_persons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studio_submission_id');
            $table->unsignedBigInteger('studio_id')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');

            $table->foreign('studio_submission_id')->references('id')->on('studio_submissions');
            $table->foreign('studio_id')->references('id')->on('studios');
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
