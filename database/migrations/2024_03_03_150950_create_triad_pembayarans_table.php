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
        Schema::create('triad_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();
            $table->string('id_bayar');
            $table->foreign('id_bayar')->references('id_bayar')->on('detail_pembayarans')->cascadeOnDelete();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('no_akun');
            $table->string('no_konsumen');
            $table->bigInteger('total_pembayaran');
            $table->dateTime('terakhir_update')->default(now());
            $table->enum('status_autojurnal', ['empty', 'no', 'verified'])->default('empty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('triad_pembayarans');
    }
};
