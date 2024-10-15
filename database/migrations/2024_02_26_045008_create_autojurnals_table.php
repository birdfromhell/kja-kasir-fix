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
        Schema::create('autojurnals', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();
            $table->string('akun_debit');
            $table->string('akun_kredit');
            $table->foreign('akun_debit')->references('no_subbukubesar')->on('sub_buku_besars')->cascadeOnUpdate();
            $table->foreign('akun_kredit')->references('no_subbukubesar')->on('sub_buku_besars')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autojurnals');
    }
};
