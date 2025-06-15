// database/migrations/YYYY_MM_DD_HHMMSS_create_pagercounter_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagercounter', function (Blueprint $table) {
            $table->id(); // Ini akan membuat kolom 'id' (Primary Key, Auto Increment)
            $table->integer('jumlah'); // Kolom 'jumlah' dengan tipe INTEGER
            // Soal meminta "Tidak boleh menambah field yang lain."
            // Jadi, tidak perlu $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagercounter');
    }
};
