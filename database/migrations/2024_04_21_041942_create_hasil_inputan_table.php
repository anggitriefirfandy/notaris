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
        Schema::create('hasil_inputans', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->foreignId('input_berkas_id')->constrained()->onDelete('cascade');
            $table->foreignId('jenis_layanan_id')->constrained()->onDelete('cascade');
            $table->string('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_inputan');
    }
};
