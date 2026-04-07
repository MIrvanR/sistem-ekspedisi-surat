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
        Schema::table('users', function (Blueprint $table) {
            // Cek dulu, kalau error sebelumnya sempat bikin kolomnya, kita lewati agar tidak dobel
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('user')->after('password');
            }
            
            // Buat kolom bagian_id sebagai angka biasa tanpa strict constraint database
            if (!Schema::hasColumn('users', 'bagian_id')) {
                $table->unsignedBigInteger('bagian_id')->nullable()->after('role');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'bagian_id')) {
                $table->dropColumn('bagian_id');
            }
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
};