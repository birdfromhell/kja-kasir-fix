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
        Schema::create('detail_ops', function (Blueprint $table) {
            $table->id();
            $table->string('id_so');
            $table->foreign('id_so')->references('id_so')->on('order_penjualans')->cascadeOnDelete();
            $table->string('barang_id');
            $table->string('nama_barang');
            $table->string('satuan');
            $table->bigInteger('stok');
            $table->bigInteger('harga');
            $table->bigInteger('potongan')->nullable();
            $table->bigInteger('diskon')->nullable();
            $table->bigInteger('total_harga');
            $table->bigInteger('harga_beli');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_ops');
    }
};
