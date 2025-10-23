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
        Schema::create('studio_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studio_submission_id');
            $table->unsignedBigInteger('studio_id')->nullable();
            $table->unsignedBigInteger('studio_number_id')->nullable();
            $table->unsignedBigInteger('document_id');
            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');


            $table->foreign('studio_submission_id')->references('id')->on('studio_submissions');
            $table->foreign('studio_id')->references('id')->on('studios');
            $table->foreign('document_id')->references('id')->on('document_files');
            $table->foreign('studio_number_id')->references('id')->on('studio_numbers');

            $table->unique(
                ['studio_id', 'studio_number_id', 'document_id'],
                'unique_studio_document'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('studio_documents');

    }
};
