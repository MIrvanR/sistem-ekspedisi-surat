<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ekspedisi', function (Blueprint $table) {
            $table->id();

            $table->foreignId('surat_id')
                ->references('id')
                ->on('surat')
                ->cascadeOnDelete();

            $table->foreignId('bagian_id')
                ->references('id')
                ->on('bagian')
                ->cascadeOnDelete();

            $table->date('tanggal_kirim');
            $table->date('tanggal_terima')->nullable();

            $table->text('disposisi')->nullable();

            $table->string('status')->default('Dikirim');

            $table->string('bukti_foto')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ekspedisi');
    }
};