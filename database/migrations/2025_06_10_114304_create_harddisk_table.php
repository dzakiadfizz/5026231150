<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('harddisk', function (Blueprint $table) {

            $table->increments('harddisk_id');

            $table->string('merkharddisk', 25);

            $table->integer('hargaharddisk');

            $table->boolean('tersedia');

            $table->float('berat');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harddisk');
    }
};
