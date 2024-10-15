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
        Schema::create('faktur_belis', function (Blueprint $table) {
            $table->id();
            $table->string('id_fb')->unique();
            $table->foreign('id_fb')->references('id_fb')->on('faktur_lines')->cascadeOnDelete();
            $table->string('id_pb')->unique();
            $table->string('id_po')->unique();
            $table->date('tanggal_fb');
            $table->string('ket');
            $table->string('kode_perusahaan');
            $table->string('nama_perusahaan');
            $table->date('jatuh_tempo');
            $table->bigInteger('total_pembelian');
            $table->bigInteger('pembayaran')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faktur_belis');
    }
};
