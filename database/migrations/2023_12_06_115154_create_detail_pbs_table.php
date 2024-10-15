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
        Schema::create('detail_pbs', function (Blueprint $table) {
            $table->id();
            $table->string('id_po');
            $table->string('id_pb');
            $table->foreign('id_pb')->references('id_pb')->on('penerimaan_barangs')->cascadeOnDelete();
            $table->string('barang_id');
            $table->string('nama_barang');
            $table->string('satuan');
            $table->bigInteger('stok');
            $table->bigInteger('harga');
            $table->bigInteger('potongan');
            $table->bigInteger('diskon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pbs');
    }
};
