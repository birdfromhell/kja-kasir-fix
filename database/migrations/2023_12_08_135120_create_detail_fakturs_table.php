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
        Schema::create('detail_fakturs', function (Blueprint $table) {
            $table->id();
            $table->string('id_pb');
            $table->string('id_fb');
            $table->foreign('id_fb')->references('id_fb')->on('faktur_belis')->cascadeOnDelete();
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
        Schema::dropIfExists('detail_fakturs');
    }
};
