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
        Schema::create('salesorder', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_Produk');
            $table->foreign('id_Produk')->references('id')->on('produk')->onDelete('cascade');
            $table->unsignedBigInteger('id_Customer');
            $table->foreign('id_Customer')->references('id')->on('customer')->onDelete('cascade');
            $table->string('No_SO');
            $table->date('tglSO');
            $table->decimal('tonase');
            $table->enum('satuan', ['Kg','Ton']);
            $table->decimal('diskon');
            $table->decimal('pajak');
            $table->decimal('ton');
            $table->decimal('kg');
            $table->decimal('zak');
            $table->decimal('jumlah', 30, 2);
            $table->decimal('total', 30, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salesorder');
    }
};