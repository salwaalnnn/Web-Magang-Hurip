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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('namaproduk');
            $table->decimal('qtyunit'); 
            $table->enum('qtysatuan', ['Kg','Ton']);
            $table->decimal('hargaunit', 15, 2); 
            $table->enum('jenisproduk', ['Industri','Nonsubsidi']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
