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
        Schema::create('detail_sjs', function (Blueprint $table) {
            $table->id();
            $table->string('id_so');
            $table->string('id_sj');
            $table->foreign('id_sj')->references('id_sj')->on('surat_jalans')->cascadeOnDelete();
            $table->string('barang_id');
            $table->string('nama_barang');
            $table->string('satuan');
            $table->bigInteger('stok');
            $table->bigInteger('harga');
            $table->bigInteger('diskon');
            $table->bigInteger('potongan')->nullable();
            $table->bigInteger('harga_beli');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_sjs');
    }
};
