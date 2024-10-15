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
        Schema::create('buku_besars', function (Blueprint $table) {
            $table->id();
            $table->string('tipe');
            $table->string('no_bukubesar')->unique();
            $table->string('ket');
            $table->bigInteger('debet')->default(0);
            $table->bigInteger('kredit')->default(0);
            $table->bigInteger('jumlah')->default(0);
            // $table->foreign('tipe')->references('tipe')->on('tipe_akuns');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku_besars');
    }
};
