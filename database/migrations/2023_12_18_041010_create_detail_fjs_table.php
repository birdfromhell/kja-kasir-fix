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
        Schema::create('detail_fjs', function (Blueprint $table) {
            $table->id();
            $table->string('id_sj');
            $table->string('id_fj');
            $table->foreign('id_fj')->references('id_fj')->on('faktur_juals')->cascadeOnDelete();
            $table->string('no_bukubesar')->nullable();
            $table->string('ket_bukubesar')->nullable();
            $table->string('no_subbukubesar')->nullable();
            $table->string('ket_subbukubesar')->nullable();
            $table->bigInteger('debit')->nullable();
            $table->bigInteger('kredit')->nullable();
            $table->string('ket');
            $table->string('kode_perusahaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_fjs');
    }
};
