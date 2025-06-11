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
        Schema::table('karyawan', function (Blueprint $table) {
            // Mengubah kolom 'departemen' menjadi VARCHAR(10)
            $table->string('departemen', 10)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('karyawan', function (Blueprint $table) {
            // Mengembalikan kolom 'departemen' menjadi INTEGER (opsional, tergantung kebutuhan rollback)
            $table->integer('departemen')->change();
        });
    }
};
