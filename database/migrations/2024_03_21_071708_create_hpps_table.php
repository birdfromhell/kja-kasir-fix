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
        Schema::create('hpps', function (Blueprint $table) {
            $table->id();
            $table->string('barang_id');
            $table->string('referensi');
            $table->string('ket');
            $table->string('stok');
            $table->string('harga_beli');
            $table->string('sisa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hpps');
    }
};
