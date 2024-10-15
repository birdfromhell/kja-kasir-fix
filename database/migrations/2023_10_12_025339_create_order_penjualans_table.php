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
        Schema::create('order_penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('id_so')->unique();
            $table->foreign('id_so')->references('id_so')->on('oplines')->cascadeOnDelete();
            $table->string('user');
            $table->date('tanggal_op');
            $table->string('kode_perusahaan');
            $table->string('nama_perusahaan');
            $table->string('detail_op')->unique();
            $table->bigInteger('potongan')->nullable();
            $table->bigInteger('diskon')->nullable();
            $table->enum('status', ['Permohonan', 'Approve', 'Decline'])->default('Permohonan');
            $table->date('jatuh_tempo');
            $table->string('id_sj')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_penjualans');
    }
};
