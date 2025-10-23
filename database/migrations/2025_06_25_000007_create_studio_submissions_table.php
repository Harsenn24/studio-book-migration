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
        Schema::create('studio_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique();
            $table->enum('status', ['rejected', 'submission', 'accepted'])->default('submission');
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');

            $table->unsignedBigInteger('created_at');
            $table->unsignedBigInteger('updated_at');
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('studio_submissions');
    }
};
