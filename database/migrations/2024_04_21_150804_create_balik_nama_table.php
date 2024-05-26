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
        Schema::create('balik_nama', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->foreignId('input_berkas_id')->constrained()->onDelete('cascade');
            $table->string('pembuatan_akta')->nullable()->default(null);
            $table->string('ttd_akta')->nullable()->default(null);
            $table->string('mutasi_pbb')->nullable()->default(null);
            $table->string('verifikasi_pajak')->nullable()->default(null);
            $table->string('plotting_validasi')->nullable()->default(null);
            $table->string('tanggal_pembayaran_bphtb')->nullable()->default(null);
            $table->string('nominal_pembayaran_bphtb')->nullable()->default(null);
            $table->string('tanggal_pembayaran_pph')->nullable()->default(null);
            $table->string('nominal_pembayaran_pph')->nullable()->default(null);
            $table->string('cek_sertifikat')->nullable()->default(null);
            $table->string('znt')->nullable()->default(null);
            $table->string('tanggal_daftar')->nullable()->default(null);
            $table->string('no_berkas')->nullable()->default(null);
            $table->string('tanggal_selesai')->nullable()->default(null);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balik_nama');
    }
};
