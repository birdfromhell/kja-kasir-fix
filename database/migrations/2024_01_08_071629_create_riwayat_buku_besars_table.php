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
        Schema::create('riwayat_buku_besars', function (Blueprint $table) {
            $table->id();
            $table->string('kode_riwayat')->unique();
            $table->date('tanggal');
            $table->string('no_bukubesar');
            $table->string('ket_bukubesar');
            $table->string('no_subbukubesar');
            $table->string('ket_subbukubesar');
            $table->string('dok'); // sj or fb or apa
            $table->string('no_referensi');
            $table->string('ket');
            $table->bigInteger('debet');
            $table->bigInteger('kredit');
            $table->bigInteger('saldo_kumulatif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_buku_besars');
    }
};
