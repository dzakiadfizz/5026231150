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
        Schema::create('keranjangbelanja', function (Blueprint $table) {
            $table->id();  $table->id();
            $table->string('item_name'); // Nama barang
            $table->integer('quantity');  // Jumlah barang
            $table->decimal('price', 10, 2); // Harga per unit (misal: 99999999.99)
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjangbelanja');
    }
};
