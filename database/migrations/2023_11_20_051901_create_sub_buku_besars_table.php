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
        Schema::create('sub_buku_besars', function (Blueprint $table) {
            $table->id();
            $table->string('no_bukubesar');
            $table->string('no_subbukubesar')->unique();
            $table->string('ket');
            $table->string('bagian_dari_bukubesar')->nullable();
            $table->bigInteger('debet')->default(0);
            $table->bigInteger('kredit')->default(0);
            $table->bigInteger('jumlah')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_buku_besars');
    }
};
