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
        Schema::create('surat_jalans', function (Blueprint $table) {
            $table->id();
            $table->string('id_sj')->unique();
            $table->foreign('id_sj')->references('id_sj')->on('sj_lines')->cascadeOnDelete();
            $table->string('id_so')->unique();
            $table->date('tanggal_sj');
            $table->date('jatuh_tempo')->nullable();
            $table->string('nopol');
            $table->string('nama_supir');
            $table->string('ket')->default('-');
            $table->string('kode_perusahaan');
            $table->string('nama_perusahaan');
            $table->enum('status', ['Permohonan', 'Approve', 'Decline', 'Faktur', 'Jurnal'])->default('Permohonan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_jalans');
    }
};
