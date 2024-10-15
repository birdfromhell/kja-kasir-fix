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
        Schema::create('faktur_juals', function (Blueprint $table) {
            $table->id();
            $table->string('id_fj')->unique();
            $table->foreign('id_fj')->references('id_fj')->on('fj_lines')->cascadeOnDelete();
            $table->string('id_sj')->unique();
            $table->string('id_so')->unique();
            $table->date('tanggal_fj');
            $table->string('ket');
            $table->string('kode_perusahaan');
            $table->string('nama_perusahaan');
            $table->date('jatuh_tempo');
            $table->bigInteger('total_penjualan');
            $table->bigInteger('pembayaran')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faktur_juals');
    }
};
