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
        Schema::create('stok_opnem_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_stok_opnem')->unique();
            $table->string('kode_barang');
            $table->date('tanggal');
            $table->string('no_bukti');
            $table->string('dok');
            $table->string('ket');
            $table->bigInteger('debet');
            $table->bigInteger('kredit');
            $table->bigInteger('stok');
            $table->bigInteger('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_opnem_barangs');
    }
};
