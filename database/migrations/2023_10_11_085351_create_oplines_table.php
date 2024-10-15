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
        Schema::create('oplines', function (Blueprint $table) {
            $table->id();            
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();         
            $table->string('id_so')->unique();
            $table->string('id_detailso')->unique();
            $table->date('hariini');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oplines');
    }
};
