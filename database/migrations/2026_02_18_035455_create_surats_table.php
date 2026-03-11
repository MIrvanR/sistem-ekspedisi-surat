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
        Schema::create('surat', function (Blueprint $table) {
            $table->id();

            $table->string('nomor_surat');
            $table->date('tanggal_surat')->nullable();
            $table->date('tanggal_masuk');

            $table->string('pengirim');
            $table->string('perihal');

            $table->enum('sifat', ['Biasa', 'Penting', 'Rahasia'])->default('Biasa');

            $table->text('disposisi')->nullable();
            $table->string('file_surat')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
