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
        Schema::create('penerimaan_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('id_pb')->unique();
            $table->foreign('id_pb')->references('id_pb')->on('pb_lines')->cascadeOnDelete();
            $table->string('id_po')->unique();
            $table->date('tanggal_pb')->nullable();
            $table->date('jatuh_tempo')->nullable();
            $table->string('surat_jalan')->unique();
            $table->string('ket');
            $table->string('kode_perusahaan');
            $table->string('nama_perusahaan');
            $table->enum('status', ['Permohonan', 'Approve', 'Decline', 'Faktur'])->default('Permohonan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaan_barangs');
    }
};
