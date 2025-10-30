<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration untuk membuat tabel tncs.
     */
    public function up(): void
    {
        Schema::create('tncs', function (Blueprint $table) {
            $table->id(); // Kolom primary key (auto increment integer)
            $table->string('code')->unique()->comment('Kode unik TnC, misalnya "STUDIO_BOOKING"');
            $table->longText('tnc')->comment('Isi lengkap Terms and Conditions');
            $table->integer('version')->default(1)->comment('Nomor versi TnC');
            $table->bigInteger('created_at');
            $table->bigInteger('updated_at');
        });
    }

    /**
     * Rollback migration (hapus tabel tncs jika dibatalkan).
     */
    public function down(): void
    {
        Schema::dropIfExists('tncs');
    }
};
