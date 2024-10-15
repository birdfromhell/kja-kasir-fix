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
        Schema::create('detail_pos', function (Blueprint $table) {
            $table->id();
            $table->string('id_po');
            $table->foreign('id_po')->references('id_po')->on('purchase_orders')->cascadeOnDelete();
            $table->string('barang_id');
            $table->string('nama_barang');
            $table->string('satuan');
            $table->bigInteger('stok');
            $table->bigInteger('harga');
            $table->bigInteger('potongan')->nullable();
            $table->bigInteger('diskon')->nullable();
            $table->bigInteger('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pos');
    }
};
