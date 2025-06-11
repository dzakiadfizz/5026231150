<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->char('kodepegawai', 5)->primary();
            $table->string('namalengkap', 50);
            $table->char('divisi', 5);
            $table->integer('departemen');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
