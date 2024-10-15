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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('id_po')->unique();
            $table->foreign('id_po')->references('id_po')->on('po_line')->cascadeOnDelete();
            $table->string('user');
            $table->date('tanggal_po');
            $table->string('kode_perusahaan');
            $table->string('nama_perusahaan');
            $table->string('detail_po')->unique();
            $table->bigInteger('diskon')->nullable();
            $table->bigInteger('potongan')->nullable();
            $table->enum('status', ['Permohonan', 'Approve', 'Decline'])->default('Permohonan');
            $table->date('jatuh_tempo');
            $table->string('id_pb')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
