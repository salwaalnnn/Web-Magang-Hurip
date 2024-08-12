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
        Schema::create('spmans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_SO');
            $table->foreign('id_SO')->references('id')->on('salesorder')->onDelete('cascade');
            $table->unsignedBigInteger('id_form');
            $table->foreign('id_form')->references('id')->on('form')->onDelete('cascade');
            $table->unsignedBigInteger('id_produk');
            $table->foreign('id_produk')->references('id')->on('produk')->onDelete('cascade');
            $table->string('no_inv');
            $table->date('tgl_inv');
            $table->string('nm_kepalagudang');
            $table->string('nopolisi');
            $table->string('nm_pengemudi');
            $table->string('nm_pengirimsurat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spmans');
    }
};
