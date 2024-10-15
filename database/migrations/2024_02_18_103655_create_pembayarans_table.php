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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('id_bayar');
            $table->foreign('id_bayar')->references('id_bayar')->on('detail_pembayarans')->cascadeOnDelete();
            $table->string('no_akun');
            $table->string('nama_akun');
            $table->bigInteger('debit');
            $table->bigInteger('kredit');
            $table->string('keterangan');
            $table->enum('mata_uang', ['IDR'])->default('IDR');
            $table->string('kurs')->nullable();
            $table->bigInteger('jumlah');
            $table->string('akun_pembantu');
            $table->string('departemen');
            $table->string('nama_karyawan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
