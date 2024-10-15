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
        Schema::create('detail_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();
            $table->string('id_bayar')->unique();
            $table->string('id_faktur');
            $table->string('no_bukubesar');
            $table->string('konsumen');
            $table->bigInteger('nilai_faktur');
            $table->bigInteger('jumlah_pembayaran');
            $table->bigInteger('sisa_pembayaran');
            $table->dateTime('pembayaran_terkahir')->default(now())->nullable()->comment('Tanggal terakhir pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembayarans');
    }
};
