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
        Schema::create('input_berkas', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->string('nama_pemilik');
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('jenis_berkas');
            $table->string('jenis_pemilik');
            $table->string('ttd_akta')->nullable()->default(null);
            $table->string('ttd_desa')->nullable()->default(null);
            $table->string('konfirmasi_camat')->nullable()->default(null);
            $table->string('verifikasi_bphtb')->nullable()->default(null);
            $table->string('daftar_ukur')->nullable()->default(null);
            $table->date('tanggal_ukur')->nullable()->default(null);
            $table->string('gambar_ukur')->nullable()->default(null);
            $table->string('daftar_yasan')->nullable()->default(null);
            $table->string('letter_c')->nullable()->default(null);
            $table->string('ktp_penjual')->nullable()->default(null);
            $table->string('kk_penjual')->nullable()->default(null);
            $table->string('ktp_pembeli')->nullable()->default(null);
            $table->string('kk_pembeli')->nullable()->default(null);
            $table->string('pbb')->nullable()->default(null);
            $table->string('kwitansi')->nullable()->default(null);
            $table->string('npwp')->nullable()->default(null);
            $table->string('efin')->nullable()->default(null);
            $table->string('konfirmasi_c')->nullable()->default(null);
            $table->string('mutasi_pbb')->nullable()->default(null);
            $table->string('plotting_sertifikat')->nullable()->default(null);
            $table->string('jenis_akta_tanah')->nullable()->default(null);
            $table->string('dokumen_lain')->nullable()->default(null);
            $table->date('tanggal_masuk')->nullable()->default(null);
            $table->date('tanggal_selesai')->nullable()->default(null);
            $table->date('tanggal_penyerahan')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_berkas');
    }
};
