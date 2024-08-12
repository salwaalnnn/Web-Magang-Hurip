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
        Schema::create('deliveryorder', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_SalesOrder');
            $table->foreign('id_SalesOrder')->references('id')->on('salesorder')->onDelete('cascade');
            $table->string('no_DO');
            $table->date('tgl_DO');
            $table->timestamps();
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveryorder');
    }
};
